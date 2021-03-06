<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Product::class;

    public function definition()
    {
        return [
            'sku' => strtoupper($this->faker->bothify('???')).'-'.$this->faker->unique()->numberBetween(1, 99),
            'name' => $this->faker->colorName().' '.ucfirst($this->faker->word()),
            'price' => rand(500, 3000)
        ];
    }
}
