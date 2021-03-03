<?php

namespace App\Http\Controllers;
//import auth facades
use Illuminate\Support\Facades\Auth;

// import Optimus for hashid
use Jenssegers\Optimus\Optimus;

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

    protected function decode($id)
    {
        // new Optimus(1580030173, 59260789, 1163945558)
        $optimus = new Optimus(1580030173, 59260789, 1163945558);
        return $optimus->decode($id);
    }

    protected function encode($id)
    {
        $optimus = new Optimus(1580030173, 59260789, 1163945558);
        return $optimus->encode($id);
    }
}
