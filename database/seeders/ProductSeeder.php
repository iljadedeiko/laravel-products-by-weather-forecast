<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Weather;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::factory()->count(15)->create();
        $weatherIds = Weather::pluck('id');

        foreach ($products as $product) {
            $product->weather()->attach($weatherIds->shuffle()->splice(0, rand(1, 3)));
        }
    }
}
