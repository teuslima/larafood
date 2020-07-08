<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Order;
use App\Models\Table;
use App\Models\Client;
use App\Models\Tenant;
use App\Models\Product;
use Illuminate\Support\Str;
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

    /**
     * Order Not Found.
     *
     * @return void
     */
    public function testOrderNotFound()
    {
        $order = 'fake_value';

        $response = $this->getJson("/api/v1/orders/{$order}");

        $response->assertStatus(404);
    }

    /**
     * Get Order.
     *
     * @return void
     */
    public function testGetOrder()
    {
        $order = factory(Order::class)->create();

        $response = $this->getJson("/api/v1/orders/{$order->identify}");

        $response->assertStatus(200);
    }

    /**
     * Test Create new Order Autheticated.
     *
     * @return void
     */
    public function testCreateNewOrderAutheticated()
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

        $client = factory(Client::class)->create();
        $token = $client->createToken(Str::random(10))->plainTextToken;

        $response = $this->postJson('/api/auth/v1/orders', $payload, [
            'Authorization' => "Bearer {$token}"
        ]);

        // $response->dump();
        $response->assertStatus(201);
    }

    
    /**
     * Test Create new Order With Table.
     *
     * @return void
     */
    public function testCreateNewOrderWithTable()
    {
        $table = factory(Table::class)->create();
        
        $tenant = factory(Tenant::class)->create();
        $payload = [
            'token_company'=> $tenant->uuid,
            'table'=> $table->uuid,
            'products' => []
        ];


        $products = factory(Product::class, 2)->create();
        foreach($products as $product){
            array_push($payload['products'], [
                'identify' => $product->uuid,
                'qty' => 2,
            ]);
        }

        $client = factory(Client::class)->create();
        $token = $client->createToken(Str::random(10))->plainTextToken;

        $response = $this->postJson('/api/v1/orders', $payload, [
            'Authorization' => "Bearer {$token}"
        ]);

        // $response->dump();
        $response->assertStatus(201);
    }

    
    /**
     * Test Get My Orders.
     *
     * @return void
     */
    public function testGetMyOrders()
    {
        $client = factory(Client::class)->create();
        $token = $client->createToken(Str::random(10))->plainTextToken;

        factory(Order::class, 15)->create(['client_id' => $client->id]);

        $response = $this->getJson('/api/auth/v1/my-orders', [
            'Authorization' => "Bearer {$token}"
        ]);

        $response->dump();
        $response->assertStatus(200);
    }
}
