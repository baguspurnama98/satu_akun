<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
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

    public function userTransaction($id_user) {
        return response()->json(['transactions' => Transaction::with('users')->where('user_id', $id_user)], 200);
    }

    public function campaignTransaction($id_campaign) {
        return response()->json(['transactions' => Transaction::with('campaigns')->where('campaign_id', $id_campaign)], 200);
    }

    public function userTransactionByCampaign($id_user, $id_campaign) {

        return response()->json(['transactions' => Transaction::with(['campaigns', 'users'])->where(['user_id' => $id_user, 'campaign_id' => $id_campaign])], 200);
    }

    // TODO verify transaction &/ update transaction
}