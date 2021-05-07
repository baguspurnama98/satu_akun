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

    protected $contact_admin = "6282266605123";


    /**
     * https://lumen.laravel.com/docs/8.x/queues
     * https://laravel.com/docs/8.x/queues#class-structure
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, $data, $type)
    {
        array_push($data, ['contact_admin' => $this->contact_admin]);
        
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
        } elseif ($this->type === 'transaction') {
            $this->sendTransactionUser($this->data, $this->user);
        } elseif ($this->type === 'members') {
            $this->sendTransactionFail($this->data, $this->user);
        } else {
            $this->sendCampaignExpired($this->data, $this->user);
        }
        
    }



    // https://medium.com/@easyselva/sending-mail-in-lumen-via-smtp-ded1079767cb
    // https://stackoverflow.com/questions/38601527/how-to-use-cpanel-email-accounts-to-send-confirmation-emails-in-laravel
    
    private function sendEmailOTP($data, $user) {
        $from_email = 'noreply@patungin.com';
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
        $from_email = 'invoice@patungin.com';
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

    /**
     * remove members
     * data == campaign
     */
    private function sendTransactionFail($campaign, $user)
    {
        $from_email = 'noreply@patungin.com';
        $surname = 'noreply';

        $data = [
            'name' => $user->name,
            // 'campaign' => $campaign->title,
            'header_info' => 'Kamu telah gagal melakukan pembayaran dalam waktu yang ditentukan pada campaign ' . $campaign->title,
            'msg_info' => 'Sistem kami telah menghapus kamu dari campaign tersebut secara otomatis.',
        ];

        Mail::send('mails.failed', $data, function($message) use($user, $from_email, $surname) {
            // to
            $message->to($user->email, $user->name)->subject('Kamu Dikeluarkan dari Campaign');
            // from
            $message->from($from_email, $surname);
        });
    }


    private function sendCampaignExpired($campaign, $user)
    {
        $from_email = 'admin@patungin.com';
        $surname = 'admin';

        $data = [
            'name' => $user->name,
            'header_info' => "Campaign kamu yang berjudul " . $campaign->title .  " telah melewati batas expired yang telah ditentukan.",
            'msg_info' => 'Sistem kami telah mengubah status campaign tersebut menjadi expired secara otomatis. Silahkan menghubungi Admin jika ada yang ditanyakan',
        ];

        Mail::send('mails.failed', $data, function($message) use($user, $from_email, $surname) {
            // to
            $message->to($user->email, $user->name)->subject('Kamu Dikeluarkan dari Campaign');
            // from
            $message->from($from_email, $surname);
        });
    }
}
