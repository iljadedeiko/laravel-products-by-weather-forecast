<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $city)
    {
        $request = Http::get("https://api.meteo.lt/v1/places/{$city}/forecasts/long-term/")
            ->json();

        $currentDate = Carbon::now()->addDays(3)->format('Y-m-d');

        $conditions = collect();
        foreach ($request['forecastTimestamps'] as $timestamp) {
            $date = substr($timestamp['forecastTimeUtc'], 0, 10);
            if (!$conditions->has($date) && $date < $currentDate) {
                $conditions->put($date, $timestamp['conditionCode']);
            }
        }
        dd($conditions);

//        return $weatherConditions;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
