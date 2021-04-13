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

    // TODO verify transaction &/ update transaction & call member campaign
    public function updateStatusTransaction($id_transaction, $status = 1) {
        $transaction = Transaction::findOrFail($id_transaction);
        try {
            $transaction->status = $status;
            $transaction->touch();
            $transaction->save();
            $this->verifyTransactionCampaign($transaction->id, false);
            return response()->json(['transaction' => $transaction, 'message' => 'UPDATED'], 201);
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
            $campaign_member = CampaignMember::where(['campaign_id' => $transaction->id_campaign, 'user_id' => $transaction->id_user])->first();
            if ($transaction->status !== 1) {
                $campaign_member->delete();
                // return
                return $withResponse ? response()->json(['message' => 'Success delete member on campaign'], 201) : false;
            } else {
                $transaction->status = 1;
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
            
            // Sisanya tinggal dimasukin ke job, jadi langsung return, kalau ada yg gagal, ntar tinggal di masukin ke log
            $transactions->update(['status' => 2]);
            Transaction::where('status', 2)->with('users.campaign_members', function($q) { 
                $q->where('is_host', 0)->delete(); 
            })->get();

            foreach ($transactions as $transaction) {
                $campaign = Campaign::where('id', $transaction->campaign_id)->first();
                $user = User::where('id', $transaction->user_id)->first();
                $type = "members";
                $emailJob = (new MailJob($user, $campaign, $type));
                dispatch($emailJob);
            }

            return response()->json(['message' => 'UPDATED'], 201);
        } catch (\Exception $err) {
            Log::error('Cron Update Transactions: ' . $err);
            return response()->json(['message' => $err], 409);
        }
        
    }
}