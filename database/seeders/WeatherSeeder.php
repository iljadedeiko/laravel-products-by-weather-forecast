<?php

namespace Database\Seeders;

use App\Models\Weather;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Weather::insert([
            ['condition' => 'clear'],
            ['condition' => 'isolated-clouds'],
            ['condition' => 'scattered-clouds'],
            ['condition' => 'overcast'],
            ['condition' => 'light-rain'],
            ['condition' => 'moderate-rain'],
            ['condition' => 'heavy-rain'],
            ['condition' => 'sleet'],
            ['condition' => 'light-snow'],
            ['condition' => 'moderate-snow'],
            ['condition' => 'heavy-snow'],
            ['condition' => 'fog'],
            ['condition' => 'na'],
        ]);
    }
}
