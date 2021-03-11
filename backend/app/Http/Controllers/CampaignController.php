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

class CampaignController extends Controller
{

    
    /**
     * Get all categories.
     *
     * @return Response
     */
    public function allCampaigns() {
        return response()->json(['campaigns' => Campaign::with(['categories'])->withCount('campaign_members as total_members')->get()], 200);
    }

    /**
     * disini nanti bakal ada pengaturan pengaturan
     * apakah perlu di filter yg bukan kedaluwarsa (dashboard / non dashboard)
     *      - ketika dashboard = false, maka filter nya yang aktif dan tidak kedaluwarsa
     * apakah di filter berdasarkan kategori
     *      - filter berdasarkan kategori
     * apakah perlu di filter berdasarkan status
     *      - filter berdasarkan status, 0 = aktif, 1 = berlangsung, 2 = expired, 3 = refund, 4 = selesai refund, 5 = selesai
     */
    public function campaign($id_campaign, $slug = null) {
        $campaign = Campaign::with(['campaign_members.users', 'categories'])->withCount('campaign_members as total_members')->findOrFail($id_campaign);
        return response()->json(['campaigns' => $campaign], 200);
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
     * 'media_url', (nullable)
     * 'password_email', (nullable)
     * 'updated_by', (nullable)
     * 'created_by', (nullable)
     */
        

    public function createCampaign(Request $request, $id_user = null) {
        $this->middleware('auth');
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
        $this->middleware('auth');

        try {
            $campaign = Campaign::findOrFail($id_campaign);
            $campaign->fill($request->all());
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
        $this->middleware('auth');
        // bakal ada pengerjaan untuk softdelete member_campaign
        // seharusnya gabisa langsung delete gitu aja
        $campaign = Campaign::findOrFail($id_campaign);
        $campaign->delete();
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
        $this->middleware('auth');
        // aktifkan ini jika masa production
        $campaign = Campaign::withCount('campaign_members as total_members')->findOrFail($id_campaign);
        $user = User::findOrFail($id_user);

        if ($user->status !== 1 || CampaignMember::where(['user_id' => $user->id, 'campaign_id' => $id_campaign])->count() > 0) {
            return response()->json(['message' => 'User Not Authorized'], 401);
        }

        if ($campaign->total_members === $campaign->slot_capacity - 1) {
            return response()->json(['message' => 'Full Capacity'], 409);
        }
        
        try {
            $member_of_campaign = new CampaignMember();
            $member_of_campaign->fill([
                'user_id' => $id_user,
                'campaign_id' => $id_campaign,
                'is_host'=> $is_host
            ]);
            $member_of_campaign->save();
            
            if ($is_host === true) return;
            $this->generateNewTransaction($campaign, $user);

            return response()->json(['campaign' => $member_of_campaign, 'message' => 'CREATED'], 201);
        } catch (\Exception $e) {
            // return error message
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
            $transaction = new Transaction();
            // bank ini di kita nya
            $transaction->fill([
                'campaign_id' => $campaign->id, 
                'user_id' => $user->id,
                'bank' => $bank,
                'no_transaction' => $date->getTimestamp(),
                'type' => 1,
                'nominal' => $price_after_fee,
                'unique_code' => $random_code,
                'total_nominal' => $final_price,
            ])->save();
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


}