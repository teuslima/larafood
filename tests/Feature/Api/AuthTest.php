<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    /**
     * Test Validation Auth.
     *
     * @return void
     */
    public function testValidationAuth()
    {
        $response = $this->postJson('/api/auth/token');
        $response->assertStatus(404); 
    }

    /**
     * Test Auth with User fake.
     *
     * @return void 
     */
    public function testAuthClientFake()
    {
        $payload = [
            'email' => 'hueuheu@gmail.com',
            'password' => 'vralaaa',
            'device_name' => Str::random(10)
        ];

        $response = $this->postJson('/api/auth/token', $payload);

        $response->assertStatus(404)
                    ->assertExactJson([
                        'message' => trans('messages.invalid_cretentials')
                    ]);
    }

    /**
     * Test Auth Sucess .
     *
     * @return void 
     */
    public function testAuthSuccess()
    {
        $client = factory(Client::class)->create();

        $payload = [
            'email' => $client->email,
            'password' => 'password',
            'device_name' => Str::random(10)
        ];

        $response = $this->postJson('/api/auth/token', $payload);

        $response->assertStatus(200)
                    ->assertJsonStructure(['token']);
    }

    /**
     * Error get me.
     *
     * @return void 
     */
    public function testErrorGetMe()
    {
        $response = $this->getJson('/api/auth/me');
        $response->assertStatus(401);
    }

    /**
     * Get me.
     *
     * @return void 
     */
    public function testGetMe()
    {
        $client = factory(Client::class)->create();
        $token = $client->createToken(Str::random(10))->plainTextToken;
        var_dump($token);

        $response = $this->getJson('/api/auth/me', [
            'Authorization' => "Bearer {$token}"
        ]);

        // $response->dump();
        $response->assertStatus(200)
                    ->assertExactJson([
                        'data' => [
                            'name' => $client->name,
                            'email' => $client->email,
                        ]
                    ]);
    }

    /**
     * Logout
     *
     * @return void 
     */
    public function testLogout()
    {
        $client = factory(Client::class)->create();
        $token = $client->createToken(Str::random(10))->plainTextToken;
        var_dump($token);

        $response = $this->postJson('/api/auth/logout', [], [
            'Authorization' => "Bearer {$token}"
        ]);

        $response->assertStatus(204);
    }
}
