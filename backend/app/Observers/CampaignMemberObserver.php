<?php


namespace App\Observers;

use App\Jobs\MailJob;
use App\Models\Campaign;
use App\Models\CampaignMember;
use App\Models\User;

/**
 * Sumber bacaan:
 * 1. Jenis state event pada observer event
 * https://www.larashout.com/how-to-use-laravel-model-observers
 * 
 * 2. Implement observer dari laravel ke lumen
 * https://medium.com/@dneey/bringing-laravel-model-observers-to-lumen-6916a16cb76b
 */

trait CampaignMemberObserver {
    protected static function boot ()
    {
        parent::boot();

        /**
         * Handle the post "deleting" event.
         * deleting : before a record is deleted or soft-deleted.
         *
         * @param  \App\CampaignMember  $campaign_member
         * @return void
         */
        static::deleting(function ($campaign_member) {
            $campaign = Campaign::where('id', $campaign_member->campaign_id)->first();
            $user = User::where('id', $campaign_member->user_id)->first();
            $type = "members";
            $emailJob = (new MailJob($user, $campaign, $type));
            dispatch($emailJob);
        });
    }
}