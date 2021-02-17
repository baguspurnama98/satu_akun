<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//import auth facades
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Models\User;

class AuthController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function register(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        try {
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $plainPassword = $request->input('password');
            $user->otp = $this->generateNumericOTP(6);
            $user->password = app('hash')->make($plainPassword);
            $user->save();
            
            // sending OTP to email
            $data = [
                'name' => $user->name,
                'otp' => $user->otp,
                'url' => route('validate', [ 'id_user' => $user->id, 'otp' => $user->otp ])
            ];
            $this->sendEmailOTP($data, $user);

            // return successful response
            return response()->json(['user' => $user, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            // return error message
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }
    }


    /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
        // validate incoming request 
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        
        try {
            $user = User::where('email', $request->email)->first();
            if ($user->status === 0) return response()->json(['message' => 'Not Validated'], 401);

            $credentials = $request->only(['email', 'password']);

            // Sistem login di handle oleh Auth attempt
            if (!$token = Auth::attempt($credentials)) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            return $this->respondWithToken($token);
        } catch (\Exception $e) {
            // return error message
            return response()->json(['message' => 'User Login Failed!'], 409);
        }
    }


    public function logout () {
        Auth::logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    // https://jwt-auth.readthedocs.io/en/develop/quick-start/
    // https://dev.to/ndiecodes/build-a-jwt-authenticated-api-with-lumen-2afm
    // https://dev.to/stefant123/secure-authentication-in-nuxt-spa-with-laravel-as-back-end-19a9
    public function refreshToken() {
        return $this->respondWithToken(Auth::refresh());
    }


    /**
     * update status user status from 0 to 1
     */
    public function validateOTP($id_user, $otp) {
        try {
            $user = User::where(['id' => $id_user, 'otp' => $otp])->first();
            $user->status = 1;
            $user->save();
        } catch (\Exception $e) {
            // return error message
            return response()->json(['message' => 'User Validation Failed!'], 409);
        }
        // Harusnya redirect ke halaman login

        return response()->json(['user' => $user, 'message' => 'VALIDATE'], 201);
    }


    private function generateNumericOTP($n) { 
        // Take a generator string which consist of 
        // all numeric digits 
        $generator = "1357902468"; 
      
        // Iterate for n-times and pick a single character 
        // from generator and append it to $result 
        $result = ""; 
      
        for ($i = 1; $i <= $n; $i++) { 
            $result .= substr($generator, (rand()%(strlen($generator))), 1); 
        }
        return $result; 
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