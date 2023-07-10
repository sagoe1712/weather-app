<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\ThirdPartyController;



class WeatherController extends Controller
{
    //
    public function checkWeatherByGeo($longitude, $latitude, Request $request){

        if(empty($longitude)){
            return response()->json('Missing Longitude from the URL', 400);
        }

        if(empty($latitude)){
            return response()->json('Missing Latitude from the URL', 400);
        }

        $data = [];
        $data['lat'] = $latitude;
        $data['lon'] = $longitude;

        $thirdPartyController = new ThirdPartyController();

        $response = $thirdPartyController->postResponse($data);

        return response()->json($response);

    }
    public function checkWeatherByCity($country,$city, Request $request){

        if(empty($country)){
            return response()->json('Missing Country from the URL', 400);
        }

        if(empty($city)){
            return response()->json('Missing City from the URL', 400);
        }



        $data = [];
        $data['city'] = $city;

        $thirdPartyController = new ThirdPartyController();

        $response = $thirdPartyController->postResponse($data);

        return response()->json($response);

    }
}
