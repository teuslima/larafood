<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Order;
use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EvaluationTest extends TestCase
{
    /**
     * Error Create New Evaluation.
     *
     * @return void
     */
    public function testErrorCreateNewEvaluation()
    {
        $order = 'fake_value';
        $response = $this->postJson("/api/auth/v1/orders/{$order}/evaluations");

        $response->assertStatus(401);
    }

    /**
     * Create New Evaluation.
     *
     * @return void
     */
    public function testCreateNewEvaluation()
    {
        $client = factory(Client::class)->create();
        $token = $client->createToken(Str::random(10))->plainTextToken;
        
        $order = $client->orders()->save(factory(Order::class)->make());


        var_dump($order);

        $payload = [
            'stars' => 5,
            'comment' => Str::random(10),
        ];

        $response = $this->postJson("/api/auth/v1/orders/{$order->identify}/evaluations", $payload, [
            'Authorization' => "Bearer {$token}"
        ]);

        $response->assertStatus(201);
    }
}
