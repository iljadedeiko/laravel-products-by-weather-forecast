<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    private $weatherObj;

    public function __construct() {
        $this->weatherObj = new WeatherController();
    }

    public function getByWeatherConditions(string $city): JsonResponse
    {
        $this->weatherObj = new WeatherController();
        $response = $this->weatherObj->weatherDataRequest($city);

        //current date +3 days
        $maxDate = Carbon::now()->addDays(3)->format('Y-m-d');

        $conditions = collect();
        foreach ($response['forecastTimestamps'] as $timestamp) {
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
