<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sku', 'price'];

    public function weather()
    {
        return $this->belongsToMany
        (
            Weather::class,
            'product_weather',
            'product_id',
            'weather_id'
        );
    }
}
