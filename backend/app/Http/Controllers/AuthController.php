<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\MailJob;
//import auth facades
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    private $URL_dev_otp = 'http://localhost:3000/account/validate-otp/';
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
            'name' => 'string',
            'email' => 'required|email|unique:users',
            'whatsapp' => 'unique:users',
            'password' => 'required|confirmed',
        ]);

        try {
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->whatsapp = $request->input('whatsapp');
            $plainPassword = $request->input('password');
            $user->otp = $this->generateNumericOTP(6);
            $user->password = app('hash')->make($plainPassword);
            $user->save();
            
            // sending OTP to email
            // $url = route('validate', [ 'id_user' => $user->id, 'otp' => $user->otp ]);
            $url = $this->URL_dev_otp . $user->id;
            $data = [
                'name' => $user->name,
                'otp' => $user->otp,
                'url' => $url,
            ];
            // $this->sendEmailOTP($data, $user);
            $emailJob = (new MailJob($user, $data));
            // masuk ke queue biar gak bloking
            dispatch($emailJob);

            // return successful response
            return response()->json(['user' => $user, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            // return error message
            return response()->json(['message' => $e], 409);
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
            if ($user->status === 0) return response()->json(['id_user' => $user->id, 'message' => 'Not Validated'], 401);

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
        try {
            Auth::logout();
        } catch (\Exception $e) {
        }
        return response()->json(['message' => 'Successfully logged out']);
    }

    // https://jwt-auth.readthedocs.io/en/develop/quick-start/
    // https://dev.to/ndiecodes/build-a-jwt-authenticated-api-with-lumen-2afm
    // https://dev.to/stefant123/secure-authentication-in-nuxt-spa-with-laravel-as-back-end-19a9
    public function refreshToken() {
        return $this->respondWithToken(Auth::refresh());
    }


    public function resendOTP($id_user) {
        $user = User::findOrFail($id_user);
        $user->otp = $this->generateNumericOTP(6);
        $user->save();

        $url = $this->URL_dev_otp . $user->id;
        $data = [
            'name' => $user->name,
            'otp' => $user->otp,
            'url' => $url,
        ];
        $emailJob = (new MailJob($user, $data));
        // masuk ke queue biar gak bloking
        dispatch($emailJob);
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


    
}