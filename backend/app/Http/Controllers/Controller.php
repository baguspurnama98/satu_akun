<?php

namespace App\Http\Controllers;
//import auth facades
use Illuminate\Support\Facades\Auth;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    // Add this method to the Controller class
    // https://jwt-auth.readthedocs.io/en/develop/quick-start/
    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ], 200);
    }
}
