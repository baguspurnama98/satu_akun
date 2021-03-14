<?php


namespace App\Observers;

use App\Models\Campaign;
use App\Models\CampaignMember;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

/**
 * Sumber bacaan:
 * 1. Jenis state event pada observer event
 * https://www.larashout.com/how-to-use-laravel-model-observers
 * 
 * 2. Implement observer dari laravel ke lumen
 * https://medium.com/@dneey/bringing-laravel-model-observers-to-lumen-6916a16cb76b
 */

trait CampaignObserver {
    protected static function boot ()
    {
        parent::boot();

        /**
         * Handle the post "deleting" event.
         * deleting : before a record is deleted or soft-deleted.
         *
         * @param  \App\Campaign  $campaign
         * @return void
         */
        static::deleting(function ($campaign) {
            $campaign->campaign_members()->delete(); // delete semua anggota campaign?
            $transaction_campaign = (new Transaction())->getTable();
            DB::table($transaction_campaign)->where('campaign_id', $campaign->id)->update([
                'campaign_id' => null,
            ]);
        });
    }
}