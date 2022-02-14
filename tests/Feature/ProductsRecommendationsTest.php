<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsRecommendationsTest extends TestCase
{

    /** @test */
    public function test_endpoints_response()
    {
        $response = $this->get('/api/v1/products/recommended/vilnius',
            [
               "weather_data_source" => "https:\/\/api.meteo.lt\/",
               "city" => "vilnius",
               "recommendations" => [
                     "weather_forecast" => "clear",
                     "date" => "2022-02-14",
                     "products" => [
                        "1" => [
                           "sku" => "TLP-25",
                           "name" => "Lime Voluptas",
                           "price" => 5.2
                        ],
                        "3" => [
                           "sku" => "SXW-50",
                           "name" => "Lavender Aut",
                           "price" => 26.34
                        ]
                     ]
                  ],
                  [
                     "weather_forecast" => "clear",
                     "date" => "2022-02-15",
                     "products" => [
                        "1" => [
                           "sku" => "TLP-25",
                           "name" => "Lime Voluptas",
                           "price" => 5.2
                        ],
                        "3" => [
                           "sku" => "SXW-50",
                           "name" => "Lavender Aut",
                           "price" => 26.34
                        ]
                     ]
                  ],
                  [
                     "weather_forecast" => "scattered-clouds",
                     "date" => "2022-02-16",
                     "products" => [
                        "2" => [
                           "sku" => "SOK-35",
                           "name" => "Navy Officiis",
                           "price" => [11.44
                        ],
                        "4" => [
                           "sku" => "UJI-54",
                           "name" => "Magenta Fuga",
                           "price" => 24.66
                        ]
                     ]
                  ]
               ]
        ]);

        $response->assertStatus(200);
    }
}
