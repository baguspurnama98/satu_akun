<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{

    function __construct()
    {
        // semua fungsi di kelas ini di jaga auth
        $this->middleware('auth');
    }

    public function allTransactions() {
        return response()->json(['transactions' => Transaction::all()], 200);
    }

    public function getTransaction($id_transaction) {
        return response()->json(['transaction' => Transaction::findOrFail($id_transaction)], 200);
    }

    public function userTransaction($id_user) {
        try {
            return response()->json(['transactions' => Transaction::with('users')->where('user_id', $id_user)->get()], 200);
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

    // TODO verify transaction &/ update transaction
    public function updateStatusTransaction($id_transaction, $status = 1) {
        $transaction = Transaction::findOrFail($id_transaction);
        try {
            $transaction->status = $status;
            $transaction->touch();
            $transaction->save();
            return response()->json(['transaction' => $transaction, 'message' => 'UPDATED'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e], 409);
        }
    }

    public function updateDataTransaction(Request $request, $id_transaction)
    {
        $this->middleware('auth');

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
}