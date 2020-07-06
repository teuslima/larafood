<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TenantTest extends TestCase
{
    /**
     * Test get all tenants
     *
     * @return void
     */
    public function testGetAllTenants()
    {
        //Tenant::truncate();

        factory(Tenant::class, 10)->create();

        $response = $this->get('/api/v1/tenants');

        // $response->dump();

        $response->assertStatus(200);

        //verifica se é 10 itens no retorno
        $response->assertjsonCount(10, 'data');
    }

    /**
     * Test get Error Single tenant
     *
     * @return void
     */
    public function testErrorGetTenant()
    {

        $tenant = 'fake_value';

        $response = $this->getJson("/api/v1/tenants/{$tenant}");

        $response->assertStatus(404);
    }

    /**
     * Test get sucess Single tenant
     *
     * @return void
     */
    public function testGetTenantByIdentify()
    {

        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/tenants/{$tenant->uuid}");

        $response->assertStatus(201);
    }
}
