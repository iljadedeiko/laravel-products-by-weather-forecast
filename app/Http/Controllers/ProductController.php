<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function getByWeatherConditions(string $city)
    {
        $request = Http::get("https://api.meteo.lt/v1/places/{$city}/forecasts/long-term/")
            ->json();

        //current date +3 days
        $maxDate = Carbon::now()->addDays(3)->format('Y-m-d');

        $conditions = collect();
        foreach ($request['forecastTimestamps'] as $timestamp) {
            $date = substr($timestamp['forecastTimeUtc'], 0, 10);
            if (!$conditions->has($date) && $date < $maxDate) {
                $conditions->put($date, ['code' => $timestamp['conditionCode'], 'date' => $date]);
            }
        }

        return response()->json([
            'weather_data_source' => 'https://api.meteo.lt/',
            'city' => $city,
            'recommendations' => $conditions->map(fn($condition) => [
                'weather_forecast' => $condition['code'],
                'date' => $condition['date'],
                'products' => Product::with('weather')
                    ->get()
                    ->filter(function ($product) use ($condition) {
                        return $product->weather->firstWhere('condition', $condition['code']) != null;
                    })->slice(0, 2)
                    ->map(fn($product) => [
                        'sku' => $product->sku,
                        'name' => $product->name,
                        'price' => $product->price / 100
                    ])
            ])->values()
        ]);
    }
}
