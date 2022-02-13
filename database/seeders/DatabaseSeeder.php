<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Weather;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            WeatherSeeder::class,
            ProductSeeder::class
        ]);
    }
}
