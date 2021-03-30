<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\MailJob;
use App\Models\Campaign;
use App\Models\CampaignCategories;
use App\Models\CampaignMember;
use App\Models\Transaction;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CampaignController extends Controller
{
    /**
     * disini nanti bakal ada pengaturan pengaturan
     * apakah perlu di filter yg bukan kedaluwarsa 
     *      - ketika all = false, maka filter nya yang aktif dan tidak kedaluwarsa
     * apakah di filter berdasarkan kategori
     *      - filter berdasarkan kategori
     * apakah perlu di filter berdasarkan status
     *      - filter berdasarkan status, 0 = aktif, 1 = berlangsung, 2 = expired, 3 = refund, 4 = selesai refund, 5 = selesai
     */
    /**
     * Get all categories.
     *
     * @return Response
     */
    public function allCampaigns(Request $request) {
        $status = $request->query('status') ?? null; 
        $category = $request->query('category') ?? null;
        $is_all = $request->query('all') ?? false; // active true if false
        $search = $request->query('search') ?? null;

        $campaigns = Campaign::with(['categories'])->withCount('campaign_members as total_members');
        
        // $campaigns = ($status !== null) ? $campaigns->statusCampaign($status) : $campaigns;
        // $campaigns = ($is_all !== false) ? $campaigns : $campaigns->active();
        $campaigns = ($status !== null && $is_all === false) ? $campaigns->statusCampaign($status) : ($is_all === false ? $campaigns->active() : $campaigns);
        if ($search !== null) {
            $campaigns->search($search);
        }
        if ($category !== null && $category !== 'all') {
            $campaigns->whereHas('categories', function($q) use ($category) {
                $q->where('categories', $category);
            });
        }

        // search by category
        // by default ambil yg aktif
        return response()->json(['campaigns' => $campaigns->get()], 200);
    }

    public function campaign($id_campaign, $slug = null) {
        $campaign = Campaign::with(['campaign_members.users', 'categories'])->withCount('campaign_members as total_members')->findOrFail($id_campaign);
        return response()->json(['campaigns' => $campaign], 200);
    }


    /**
     * jika host params punya nilai
     * maka query where is_host akan dilakukan (utk menentukan apakah ini campaign by host atau patungan by slot)
     * jika tidak, maka akan ambil semua data campaign
     * 
     * jika query active didefenisikan bernilai true
     * maka akan ambil campaignnya user yang sedang aktif saja, scr default ambil semua
     */
    public function campaignByUser(Request $request, $id_user) {
        $is_host = $request->query('host') ?? null; // boolean true / false
        $is_active = $request->query('active') ?? false; // boolean true / false
        $status = $request->query('status') ?? null; 
        
        $campaign = Campaign::withCount(['campaign_members as total_members', 'transactions as total_transactions' => function ($query) {
                                    // ambil yang sudah di verif saja 
                                    // perlu juga dilakukan kalkulasi yg in atau out
                                    return $query->where('status', 1)->select(DB::raw('SUM(nominal)'));
                             }])
                             ->with(['emails', 'campaign_members' ])
                             ->whereHas('campaign_members', function ($query) use($id_user, $is_host) { 
                                if ($is_host !== null) {
                                    $is_host = filter_var($is_host, FILTER_VALIDATE_BOOLEAN);
                                    return $query->where(['user_id' => $id_user, 'is_host' => $is_host]);
                                }
                                return $query->where(['user_id' => $id_user]);
                            });
                                
        $campaign = ($is_active && $status === null) ? $campaign->active() : $campaign;
        $campaign = ($status !== null) ? $campaign->statusCampaign($status) : $campaign;
        
        return response()->json(['campaigns' => $campaign->get()], 200);

    }

    /**
     * data ini akan berada di fill input
     * 'email_id',
     * 'categories_id',
     * 'title',
     * 'description',
     * 'expired_date',
     * 'duration_date',
     * 'durasi',
     * 'status' (nullable) -> default 0,
     * 'slot_capacity',
     * 'slot_price',
     * 'media_blob', (tdk ada di database, required)
     * 'media_url', (nullable)
     * 'password_email', (nullable)
     * 'updated_by', (nullable)
     * 'created_by', (nullable)
     */
        

    public function createCampaign(Request $request, $id_user = null) {
        // validate incoming request 
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'slot_capacity' => 'required',
            'slot_price' => 'required',
            'expired_date' => 'required',
            'duration_date' => 'required',
        ]);

        try {
            $campaign = new Campaign();
            $campaign->fill($request->all());
            if ($request->hasFile('media_blob')) {
                $image_name = Str::random(8) . date("Ymd");
                $request->file('media_blob')->move(storage_path('uploads/image_campaign'), $image_name);
                // $image_path = storage_path('campaign') . '/' . $campaign->media_url;
                // if (file_exists($image_path)) {
                //     unlink($image_path);
                // }
                $generated_src = route('image_campaign', ['image_name' => $image_name]);

                $campaign->media_url = $generated_src;
            }
            $campaign->save();
            // return successful response
            if ($id_user !== null) {
                $this->assignMemberToCampaign($campaign->id, $id_user, true);
            }

            return response()->json(['campaign' => $campaign, 'message' => 'CREATED'], 201);
        } catch (\Exception $e) {
            // return error message
            return response()->json(['message' => $e], 409);
        }
    }

    public function updateCampaign(Request $request, $id_campaign) {

        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'slot_capacity' => 'required',
            'slot_price' => 'required',
            'expired_date' => 'required',
            'duration_date' => 'required',
            'media_blob' => 'image',
        ]);

        try {
            $campaign = Campaign::findOrFail($id_campaign);
            $campaign->fill($request->all());
            if ($request->hasFile('media_blob')) {
                $image_name = Str::random(8) . date("Ymd");
                
                // cek apakah ada image yg perlu di hapus
                $pos = strrpos($campaign->media_url, '/');
                $curr_image = ($pos === false) ? $campaign->media_url : substr($campaign->media_url, $pos + 1);
                $image_path = storage_path('uploads/image_campaign') . '/' . $curr_image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
                
                // simpan image
                $request->file('media_blob')->move(storage_path('uploads/image_campaign'), $image_name);
                $generated_src = route('image_campaign', ['image_name' => $image_name]);
                $campaign->media_url = $generated_src;
            }
            $campaign->touch();
            $campaign->save();
            // return successful response
            return response()->json(['campaign' => $campaign, 'message' => 'UPDATED'], 201);
        } catch (\Exception $e) {
            // return error message
            return response()->json(['message' => $e], 409);
        }
    }

    public function deleteCampaign($id_campaign) {
        // bakal ada pengerjaan untuk softdelete member_campaign
        // seharusnya gabisa langsung delete gitu aja
        $campaign = Campaign::findOrFail($id_campaign);
        try {
            // cek apakah ada image yg perlu di hapus
            $pos = strrpos($campaign->media_url, '/');
            $curr_image = ($pos === false) ? $campaign->media_url : substr($campaign->media_url, $pos + 1);
            $image_path = storage_path('uploads/image_campaign') . '/' . $curr_image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $campaign->delete();
            return response()->json(['message' => 'DELETED'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e], 409);
        }
    }


    public function imageCampaign($image_name) {
        $image_path = storage_path('uploads/image_campaign') . '/' . $image_name;
        if (file_exists($image_path)) {
            $file = file_get_contents($image_path);
            return response($file, 200)->header('Content-Type', 'image/jpeg');
        }
        
        return response()->json(['message' => 'Image Not Found'], 404);
    }


    // ---------------------------------- Checkout
    /**
     * Daftar to slot
     * 
     * 'user_id',
     * 'campaign_id',
     * 'is_host' default 0,
     * 'is_pay' default 0,
     * 'info', (nullable)
     * 'updated_by', (nullable)
     * 'created_by', (nullable)
     */

    public function assignMemberToCampaign($id_campaign, $id_user, $is_host = false)
    {
        // aktifkan ini jika masa production
        $campaign = Campaign::withCount('campaign_members as total_members')->findOrFail($id_campaign);
        $user = User::findOrFail($id_user);

        if ($user->status !== 1 || CampaignMember::where(['user_id' => $user->id, 'campaign_id' => $id_campaign])->count() > 0) {
            return response()->json(['message' => 'User Not Authorized'], 401);
        }
        
        // DB::beginTransaction();
        if ($campaign->total_members === $campaign->slot_capacity + 1) {
            DB::rollBack();
            return response()->json(['message' => 'Full Capacity'], 409);
        }
        
        try {
            $member_of_campaign = CampaignMember::create([
                'user_id' => $id_user,
                'campaign_id' => $id_campaign,
                'is_host' => $is_host]);
                

            if ($is_host === true) return;
            $this->generateNewTransaction($campaign, $user);
            
            // DB::commit();
            return response()->json(['campaign' => $member_of_campaign, 'message' => 'CREATED'], 201);
        } catch (\Exception $e) {
            // return error message
            // DB::rollBack();
            return response()->json(['message' => $e], 409);
        }
    }


    // Create new transaction
    /**
     * 'campaign_id', 
     * 'user_id',
     * 'bank',
     * 'no_transaction', (auto generate in model by transaction_id)
     * 'type', required 0 / 1 (in / out)
     * 'nominal',
     * 'unique_code',
     * 'total_nominal',
     * 'no_rek_origin', (nullable)
     * 'no_rek_destination', (nullable)
     * 'updated_by', (nullable)
     * 'created_by', (nullable)
     */
    private function generateNewTransaction($campaign, $user, $bank = 'OVO')
    {
        $price_after_fee = getCalculatedPrice($campaign->slot_price);
        $random_code = mt_rand(10,999); // gunakan round aja kalau sistem ga support
        $final_price = $price_after_fee + $random_code;

        $date = new DateTime();
        
        try {
            $transaction = Transaction::create([
                'campaign_id' => $campaign->id, 
                'user_id' => $user->id,
                'bank' => $bank,
                'no_transaction' => $date->getTimestamp(),
                'type' => 1,
                'nominal' => $price_after_fee,
                'unique_code' => $random_code,
                'total_nominal' => $final_price,
            ]);
            // bank ini di kita nya
            $url = "wa.me/628976634788?text=" . $user->id . '/' . $transaction->id . '/no_transaksi=' . $transaction->no_transaction;
            $data = [
                'name' => $user->name,
                'desc' => $campaign->title,
                'no_transaction' => $transaction->no_transaction,
                'total' => formatRupiah($final_price),
                'created_at' => convertDateTime($transaction->created_at),
                'url' => $url,
            ];
            $type = 'transaction';
            $emailJob = (new MailJob($user, $data, $type));
            // masuk ke queue biar gak bloking
            dispatch($emailJob);
            
            // lakukan scheduling apakah sudah 2 jam utk di remove habis ini
        } catch (\Exception $e) {
            return response()->json(['message' => $e], 409);
        }
        
    }

    // ---------------------------------- Campaign Member

    public function getMemberOnCampaign($id_campaign, $id_user = null) {
        $condition = ['campaign_id' => $id_campaign];
        if ($id_user !== null) {
            $condition = array_merge($condition, ['user_id' => $id_user]);
        } 
        try {
            $campaign_members = CampaignMember::where($condition)->get();
            return response()->json(['campaign_members' => $campaign_members, 'message' => 'SUCCESS'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e], 409);
        }
    }


    // ---------------------------------- Categories

    /**
     * Get all categories.
     *
     * @return Response
     */
    public function allCategories() {
        return response()->json(['categories' => CampaignCategories::all()], 200);
    }

    /**
     * Create categories.
     *
     * @param  Request  $request
     * @return Response post
     */
    public function storeCategories(Request $request) {
        // 
        try {
            $categories = new CampaignCategories();
            $categories->categories = $request->input('categories');
            $categories->save();
            // return successful response
            return response()->json(['categories' => $categories, 'message' => 'CREATED'], 201);
        } catch (\Exception $e) {
            // return error message
            return response()->json(['message' => $e], 409);
        }
    }

    public function deleteCategories($id_categories) {
        try {
            $categories = CampaignCategories::findOrFail($id_categories);
            $categories->delete();
            return response()->json(['message' => 'DELETED'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e], 409);
        }
    }

}