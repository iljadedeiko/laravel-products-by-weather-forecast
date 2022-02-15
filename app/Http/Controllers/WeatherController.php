<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function weatherDataRequest(string $city) {
        try {
            $request = Http::get("https://api.meteo.lt/v1/places/{$city}/forecasts/long-term/")
                ->json();
        } catch (Exception $e) {
            throw new \Exception($e->getCode());
        }

        return $request;
    }
}
