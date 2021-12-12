<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ZohoController extends Controller
{
    public function get_token()
    {
        $response = Http::post('https://accounts.zoho.com/oauth/v2/token', [
            'grant_type' => 'authorization_code',
            'client_id' => '1000.TUHFZ20LPDQ2ILKYSP7EVBRJKRRZ0X',
            'client_secret' => 'dceba43db3f06524d2cdadb3da0783e412cf2bbd34',
            'redirect_uri' => 'http://laravel-network.loc/groups',
            'code' => '1000.65e724e275e1a32e8f54476a9406fe09.1db507c3f0e7b3eaff5d9f05e89403d8',
        ]);
        dd($response->body());
    }
}
