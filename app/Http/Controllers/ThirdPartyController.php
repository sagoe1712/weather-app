<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ThirdPartyController extends Controller
{
    //
    protected $thirdPartyUrl = 'https://api.weatherbit.io/v2.0/current?';

    protected $apiKey = 'ed25b21bc1e34d79915eab85fcd91c3f';
    private function sendRequest($data){

        $data['key'] = $this->apiKey;

        $response = Http::get($this->thirdPartyUrl, $data);

        if ($response->failed()) {
            return ['error' => 'Failed to retrieve weather data'];
        }
        return $response->json();

    }

    public function postResponse($data){
        return $this->sendRequest($data);
    }
}
