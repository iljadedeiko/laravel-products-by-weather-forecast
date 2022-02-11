<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;

    protected $fillable = ['condition'];

    public function product()
    {
        return $this->belongsToMany
        (
            Product::class,
            'product_weather',
            'weather_id',
            'product_id'
        );
    }
}
