<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MailJob extends Job
{

    /**
     * The podcast instance.
     *
     * @var \App\Models\Podcast
     */
    protected $user;
    protected $data;


    /**
     * https://lumen.laravel.com/docs/8.x/queues
     * https://laravel.com/docs/8.x/queues#class-structure
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, $data)
    {
        // https://laravel.com/docs/8.x/queues#handling-relationships
        $this->user = $user->withoutRelations();
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $this->sendEmailOTP($this->data, $this->user);
    }



    // https://medium.com/@easyselva/sending-mail-in-lumen-via-smtp-ded1079767cb
    // https://stackoverflow.com/questions/38601527/how-to-use-cpanel-email-accounts-to-send-confirmation-emails-in-laravel
    
    private function sendEmailOTP($data, $user) {
        $from_email = 'noreply@baguspurnama.com';
        $surname = 'noreply';

        /**
         * @param 'templates.mail' = blade email yang bakal di kirim kan ke email
         * @param $data berisi array, di dalamnya ada name, name bakal di echo dalam template
         * @param $from_email harus sama dengan domain pada ENV, (domain.com)
         */
        Mail::send('mails.otp', $data, function($message) use($user, $from_email, $surname) {
            // to
            $message->to($user->email, $user->name)->subject('Authentikasi Patungan');
            // from
            $message->from($from_email, $surname);
        });
    }
}
