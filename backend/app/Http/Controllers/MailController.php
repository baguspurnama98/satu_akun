<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function mail() {
        // https://medium.com/@easyselva/sending-mail-in-lumen-via-smtp-ded1079767cb
        // https://stackoverflow.com/questions/38601527/how-to-use-cpanel-email-accounts-to-send-confirmation-emails-in-laravel
        $data = array('name'=>"Apri");
        /**
         * @param 'templates.mail' = blade email yang bakal di kirim kan ke email
         * @param $data berisi array, di dalamnya ada name, name bakal di echo dalam template
         */
        Mail::send('templates.mail', $data, function($message) {
            $message->to('apriyantotobing8@gmail.com', 'Apri')->subject('Test Mail from Apri');
            $message->from('dcec452c74-5992ee@inbox.mailtrap.io','Apri');
        });
        echo "Email Sent. Check your inbox.";
    }

}