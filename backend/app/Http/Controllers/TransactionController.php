<?php

namespace App\Http\Controllers;

use App\Models\CampaignMember;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;

class TransactionController extends Controller
{

    function __construct()
    {
        
    }

    public function allTransactions() {
        return response()->json(['transactions' => Transaction::all()], 200);
    }

    public function getTransaction($id_transaction) {
        return response()->json(['transaction' => Transaction::findOrFail($id_transaction)], 200);
    }

    public function userTransaction($id_user) {
        try {
            return response()->json(['transactions' => Transaction::with(['campaigns', 'users'])->where('user_id', $id_user)->get()], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e], 409);
        }
    }

    public function campaignTransaction($id_campaign) {
        try {
            return response()->json(['transactions' => Transaction::with('campaigns')->where('campaign_id', $id_campaign)->get()], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e], 409);
        }
    }

    public function userTransactionByCampaign($id_user, $id_campaign) {
        try {
            return response()->json(['transactions' => Transaction::with(['campaigns', 'users'])->where(['user_id' => $id_user, 'campaign_id' => $id_campaign])->get()], 200);
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
            $transaction = Transaction::where('timeout', '<=', Carbon::now())->where('status', 0)->whereHas('users.campaign_members');
            if ($transaction->doesntExist() || $transaction->count() === 0) return response()->json(['message' => 'No Transaction'], 200); 
            
            // Sisanya tinggal dimasukin ke job, jadi langsung return, kalau ada yg gagal, ntar tinggal di masukin ke log
            $transaction->update(['status' => 2]);
            Transaction::where('status', 2)->with('users.campaign_members', function($q) { $q->where('is_host', 0)->delete(); })->get();

            return response()->json(['message' => 'UPDATED'], 201);
        } catch (\Exception $err) {
            return response()->json(['message' => $err], 409);
        }
        
    }
}