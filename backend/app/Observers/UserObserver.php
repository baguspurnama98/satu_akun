<?php


namespace App\Observers;

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

trait UserObserver {
    protected static function boot ()
    {
        parent::boot();

        /**
         * Handle the post "deleting" event.
         * deleting : before a record is deleted or soft-deleted.
         *
         * @param  \App\User  $user
         * @return void
         */
        static::deleting(function ($user) {
            $user->campaign_members()->delete();
            $user->social_media()->delete();
            $transaction_user = (new Transaction())->getTable();
            DB::table($transaction_user)->where('user_id', $user->id)->update([
                'delete' => 1,
                'user_id' => null,
            ]);
        });
    }
}