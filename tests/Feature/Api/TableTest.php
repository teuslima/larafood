<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Table;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TableTest extends TestCase
{
    /**
     * Error Get Tables by Tenant
     *
     * @return void
     */
    public function testGetAllTablesTenantError()
    {
        $response = $this->getJson('/api/v1/tables');
        $response->assertStatus(422);
    }

    /**
     * Get All Tables by Tenant
     *
     * @return void
     */
    public function testGetAllTablesByTenant()
    {
        $tenant = factory(Tenant::class)->create();
        $response = $this->getJson("/api/v1/tables?token_company={$tenant->uuid}");
        // $response->dump();
        $response->assertStatus(200);
    }

    /**
     * Error Get Table by Tenant
     *
     * @return void
     */
    public function testErrorGetTableByIdentify()
    {
        $table = "fake_table";
        $tenant = factory(Tenant::class)->create();
        $response = $this->getJson("/api/v1/tables/{$table}?token_company={$tenant->uuid}");
        $response->assertStatus(404);
    }

    /**
     * Get Table by Tenant
     *
     * @return void
     */
    public function testGetTableByIdentify()
    {
        $table = factory(Table::class)->create();
        $tenant = factory(Tenant::class)->create();
        $response = $this->getJson("/api/v1/tables/{$table->uuid}?token_company={$tenant->uuid}");
        $response->assertStatus(200);
    }
}
