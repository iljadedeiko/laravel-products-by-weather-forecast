<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsRecommendationsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    /** @test */
    public function response_endpoints_test()
    {
        $response = $this->get('/api/v1/products/recommended/vilnius');

        $response->assertSuccessful();
    }
}
