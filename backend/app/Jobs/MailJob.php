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
    protected $type;


    /**
     * https://lumen.laravel.com/docs/8.x/queues
     * https://laravel.com/docs/8.x/queues#class-structure
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, $data, $type)
    {
        // https://laravel.com/docs/8.x/queues#handling-relationships
        $this->user = $user->withoutRelations();
        $this->data = $data;
        $this->type = $type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        if ($this->type === 'otp') {
            $this->sendEmailOTP($this->data, $this->user);
        } else {
            $this->sendTransactionUser($this->data, $this->user);
        }
        
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
            $message->to($user->email, $user->name)->subject('Authentikasi Patungin');
            // from
            $message->from($from_email, $surname);
        });
    }

    private function sendTransactionUser($data, $user)
    {
        $from_email = 'invoice@baguspurnama.com';
        $surname = 'Patungin';

        /**
         * @param 'templates.mail' = blade email yang bakal di kirim kan ke email
         * @param $data berisi array, di dalamnya ada name, url, total, desc, created_at
         * @param $from_email harus sama dengan domain pada ENV, (domain.com)
         */
        Mail::send('mails.transaction', $data, function($message) use($user, $from_email, $surname) {
            // to
            $message->to($user->email, $user->name)->subject('Invoice Patungin');
            // from
            $message->from($from_email, $surname);
        });
    }
}
