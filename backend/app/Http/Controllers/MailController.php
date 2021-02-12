<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    
    // https://medium.com/@easyselva/sending-mail-in-lumen-via-smtp-ded1079767cb
    // https://stackoverflow.com/questions/38601527/how-to-use-cpanel-email-accounts-to-send-confirmation-emails-in-laravel
    
    private function mail($to_email, $from_email, $surname) {
        $data = ['name' => 'Apri'];
        /**
         * @param 'templates.mail' = blade email yang bakal di kirim kan ke email
         * @param $data berisi array, di dalamnya ada name, name bakal di echo dalam template
         * @param $from_email harus sama dengan domain pada ENV, (domain.com)
         */
        Mail::send('templates.mail', $data, function($message) use($to_email, $from_email, $surname) {
            $message->to($to_email, 'Apri')->subject('Test Mail from Apri');
            $message->from($from_email, $surname);
        });
        
    }

    
    public function send_mail(Request $request)
    {
        // email, text to email
        $this->mail($request->input('to_email'), $request->input('from_email'), $request->input('surname'));
        return response()->json('success', 200);
    }

}