<?php


namespace App\Observers;

use App\Models\Campaign;
use Illuminate\Support\Facades\DB;

/**
 * Sumber bacaan:
 * 1. Jenis state event pada observer event
 * https://www.larashout.com/how-to-use-laravel-model-observers
 * 
 * 2. Implement observer dari laravel ke lumen
 * https://medium.com/@dneey/bringing-laravel-model-observers-to-lumen-6916a16cb76b
 */

trait EmailObserver {
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
        static::deleting(function ($email) {
            $campaign = (new Campaign())->getTable();
            DB::table($campaign)->where('email_id', $email->id)->update([
                'email_id' => null,
            ]);
        });
    }
}