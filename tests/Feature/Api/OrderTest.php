<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Tenant;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    /**
     * Error store order.
     *
     * @return void
     */
    public function testErrorStoreOrder()
    {
        $payload = [];

        $response = $this->postJson('/api/v1/orders');

        // $response->assertStatus(422)
        //             ->assertJsonPath('erros.token_company', [
        //                 trans('validation.required', ['attribute' => 'token company'])
        //             ])
        //             ->assertJsonPath('erros.products', [
        //                 trans('validation.required', ['attribute' => 'products'])
        //             ]);
        $response->assertStatus(422);
    }

    /**
     * Store order.
     *
     * @return void
     */
    public function testStoreOrder()
    {
        $tenant = factory(Tenant::class)->create();
        $payload = [
            'token_company'=> $tenant->uuid,
            'products' => []
        ];


        $products = factory(Product::class, 10)->create();
        foreach($products as $product){
            array_push($payload['products'], [
                'identify' => $product->uuid,
                'qty' => 2,
            ]);
        }

        $response = $this->postJson('/api/v1/orders', $payload);
        $response->dump();
        $response->assertStatus(201);
    }

    /**
     * Test Total Order.
     *
     * @return void
     */
    public function testTotalOrder()
    {
        $tenant = factory(Tenant::class)->create();
        $payload = [
            'token_company'=> $tenant->uuid,
            'products' => []
        ];


        $products = factory(Product::class, 2)->create();
        foreach($products as $product){
            array_push($payload['products'], [
                'identify' => $product->uuid,
                'qty' => 2,
            ]);
        }

        $response = $this->postJson('/api/v1/orders', $payload);
        $response->dump();
        $response->assertStatus(201)
            ->assertJsonPath('data.total', 60);
    }
}
