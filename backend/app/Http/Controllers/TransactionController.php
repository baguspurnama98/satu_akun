<?php

namespace App\Http\Controllers;

use App\Jobs\MailJob;
use App\Models\Campaign;
use App\Models\CampaignMember;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{

    protected $typeTransaction = [
        'type_0' => 'admin ke host',
        'type_1' => 'user ke admin',
        'type_2' => 'admin ke user'
    ];

    function __construct()
    {
        
    }

    public function allTransactions() {
        return response()->json(['transactions' => Transaction::all(), 'informasi' => $this->typeTransaction], 200);
    }

    public function getTransaction($id_transaction) {
        return response()->json(['transaction' => Transaction::with([
            'users', 'campaigns'
        ])->findOrFail($id_transaction), 'informasi' => $this->typeTransaction], 200);
    }

    public function userTransaction($id_user) {
        try {
            return response()->json(['transactions' => Transaction::with(['campaigns', 'users'])->where('user_id', $id_user)->get(), 'informasi' => $this->typeTransaction], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e], 409);
        }
    }


    public function campaignTransactions($id_campaign = null) {
        try {
            $transactionByCampaigns = Campaign::with(['campaign_members' => function ($q) { 
                // tingkatan kedua, relasi ke
                $q->where('is_host', 0)->whereHas('transactions')->with('transactions', function($q) { 
                    // disini bisa dapat semua jenis transaksi yg sudah diverif dari relasi campaign members
                    $q->where('status', 1); 
                }); 
            
            }])->withCount(['transactions as total_receive' => function ($query) {
                // ambil yang sudah di verif saja 
                return $query->where(['status' => 1, 'type' => 1])->select(DB::raw('SUM(nominal)'));
            }])->withCount(['transactions as total_disburse' => function ($query) {
                // ambil yang sudah di verif saja 
                // type 0 berarti admin ke host
                return $query->where(['status' => 1, 'type' => 0])->select(DB::raw('SUM(nominal)'));
            }])->withCount(['transactions as total_refund' => function ($query) {
                // ambil yang sudah di verif saja 
                // type 0 berarti admin ke host
                return $query->where(['status' => 1, 'type' => 2])->select(DB::raw('SUM(nominal)'));
            }])->whereHas('campaign_members'); // ada penjagaan campaign members?
            
            return response()->json(['campaigns' => $id_campaign !== null ? $transactionByCampaigns->where('id', $id_campaign)->get() : $transactionByCampaigns->get(), 'informasi' => $this->typeTransaction], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e], 409);
        }
    }


    // ini harus yang bukan invalid (status != 2)
    public function userTransactionByCampaign($id_user, $id_campaign) {
        try {
            return response()->json(['transactions' => Transaction::with(['campaigns', 'users'])->where(['user_id' => $id_user, 'campaign_id' => $id_campaign])->where('status', '!=' ,2)->get(), 'informasi' => $this->typeTransaction], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e], 409);
        }
    }


    // gunanya untuk cek si transaksi si member
    /**
     * return response atau boolean true / false bergantung apakah si user udah bayar atau blm
     */
    public function verifyTransactionCampaign($id_transaction, $withResponse = true)
    {
        $transaction = Transaction::where('id', $id_transaction)->first();
        try {
            $campaign_member = CampaignMember::where(['campaign_id' => $transaction->campaign_id, 'user_id' => $transaction->user_id])->first();
            if ($transaction->status !== 1) {
                $campaign_member->delete();
                // return
                return $withResponse ? response()->json(['message' => 'Success delete member on campaign'], 201) : false;
            } else {
                $campaign_member->is_pay = 1;
                $campaign_member->touch();
                $campaign_member->save();
                return $withResponse ? response()->json(['campaign_members' => $campaign_member, 'message' => 'UPDATED'], 201) : true;
            }
            
        } catch (\Exception $e) {
            return response()->json(['message' => $e], 409);
        }
    }
    

    public function updateDataTransaction(Request $request, $id_transaction)
    {
        try {
            $transaction = Transaction::findOrFail($id_transaction);
            $transaction->fill($request->all());
            $transaction->touch();
            $transaction->save();

            $this->verifyTransactionCampaign($id_transaction, false);
            // return successful response
            return response()->json(['transaction' => $transaction, 'message' => 'UPDATED'], 201);
        } catch (\Exception $e) {
            // return error message
            return response()->json(['message' => $e], 409);
        }
    }


    public function deleteTransaction($id_transaction)
    {
        $transaction = Transaction::findOrFail($id_transaction);
        try {
            $transaction->delete = 1;
            $transaction->touch();
            $transaction->save();
            return response()->json(['transaction' => $transaction, 'message' => 'UPDATED'], 201);
        } catch (\Exception $e) {
            // return error message
            return response()->json(['message' => $e], 409);
        } 
    }


    public function cronCheckTransaction() {
        try {
            $transactions = Transaction::where('timeout', '<=', Carbon::now())->where('status', 0)->whereHas('users.campaign_members');
            if ($transactions->doesntExist() || $transactions->count() === 0) return response()->json(['message' => 'No Transaction'], 200); 

            foreach ($transactions->get() as $transaction) {
                $updated_transaction = $this->updateStatus($transaction, 0);
                $campaign = Campaign::where('id', $updated_transaction->campaign_id)->first();
                $user = User::where('id', $updated_transaction->user_id)->first();
                $type = "members";
                $emailJob = (new MailJob($user, $campaign, $type));
                dispatch($emailJob);
            }

            $this->bulkingDeleteMember();

            return response()->json(['message' => 'UPDATED'], 201);
        } catch (\Exception $err) {
            Log::error('Cron Update Transactions: ' . $err);
            return response()->json(['message' => $err], 409);
        }
        
    }


    protected $apiSignature = 'sMcN8od7tHFXM4tnTHFdBcQrf4AtDm0H';
    /**
     * https://github.com/trijayadigital/cekmutasi-laravel/blob/master/src/Cekmutasi.php#L125
     * 
     * cth response
     * {"message":{"action":"payment_report","content":{"service_name":"BRI","service_code":"bri","account_number":"129129120129","account_name":"Apri","data":[{"id":1,"unix_timestamp":1620401882,"type":"credit","amount":"90000.00","description":"Test From Cekmutasi","balance":"150000.00"}],"timezone":"Asia\/Jakarta"}}}
     */
    public function callbackPayment(Request $request) {
        $incomingSignature = $request->server('HTTP_API_SIGNATURE');

        if ( empty($incomingSignature) ) {
            Log::info(get_class($this).': Undefined Signature');
            exit("Undefined signature!");
        }

        if ( $this->apiSignature !== $incomingSignature ) {
            Log::info(get_class($this).': Invalid Signature, ' . $this->apiSignature . ' vs ' . $incomingSignature);
            exit("Invalid signature!");
        }

        $json = $request->getContent();
        $response = json_decode($json); // decoded

        if ( json_last_error() !== JSON_ERROR_NONE ) {
            Log::info(get_class($this).': Invalid JSON, ' . $json);
            exit("Invalid JSON!");
        }

        if ($response->action === 'payment_report') {
            foreach ($response->content->data as $dataTransaction) {
                $total_nominal = (int) $dataTransaction->amount;
                $transaction = Transaction::where('total_nominal', $total_nominal)
                                          ->where('timeout', '>=', Carbon::now()->startOfDay())
                                          ->with('campaign_members', function ($q) {
                                                $q->update([
                                                    'is_pay' => 1
                                                ]);
                                            });
                $transaction = $this->updateStatus($transaction, 1);
                $transaction = $transaction->get();
            }
            
        }

        return response()->json(['message' => "UPDATED"], 201);
    }



    private function updateStatus($transaction, $status)
    {
        return tap($transaction)->update(['status' => $status]); 
    }

    /**
     * where status = 2
     */
    private function bulkingDeleteMember() {
        // Sisanya tinggal dimasukin ke job, jadi langsung return, kalau ada yg gagal, ntar tinggal di masukin ke log
        Transaction::where('status', 2)->with('users.campaign_members', function($q) { 
            $q->where(['is_host' => 0, 'is_pay' => 0])->delete(); 
        })->get();
    }
}