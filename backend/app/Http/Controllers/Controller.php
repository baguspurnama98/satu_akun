<?php

namespace App\Http\Controllers;
//import auth facades

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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

    protected function getToken($token)
    {
        return $token;
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

    protected function convertDateTime($dateTime)
    {
        Carbon::setLocale('id');
        return Carbon::parse($dateTime)->format('d/M/Y H:i');
    }

    protected function formatRupiah($value)
    {
        return "Rp " . number_format($value, 0, ",", ".") . ',-';
    }


    /**
     * helper for CORS, fetch data from server side
     * future improve maybe adding some data request
     */
    public function fetchURL(Request $request) {
        $url = $request->query('url');
        $response = Http::get($url)->throw();

        return response()->json(['data' => $response->json(), 'message' => 'SUCCESS'], 200);
    }
}
