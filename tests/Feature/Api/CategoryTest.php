<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Tenant;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    /**
     * Error Get Categories by Tenant
     *
     * @return void
     */
    public function testGetAllCategoriesTenantError()
    {
        $response = $this->getJson('/api/v1/categories');
        $response->assertStatus(422);
    }

    /**
     * Get All Categories by Tenant
     *
     * @return void
     */
    public function testGetAllCategoriesByTenant()
    {
        $tenant = factory(Tenant::class)->create();
        $response = $this->getJson("/api/v1/categories?token_company={$tenant->uuid}");
        // $response->dump();
        $response->assertStatus(200);
    }

    /**
     * Error Get Category by Tenant
     *
     * @return void
     */
    public function testErrorGetCategoryByIdentify()
    {
        $category = "fake_category";
        $tenant = factory(Tenant::class)->create();
        $response = $this->getJson("/api/v1/categories/{$category}?token_company={$tenant->uuid}");
        $response->assertStatus(404);
    }

    /**
     * Get Category by Tenant
     *
     * @return void
     */
    public function testGetCategoryByIdentify()
    {
        $category = factory(Category::class)->create();
        $tenant = factory(Tenant::class)->create();
        $response = $this->getJson("/api/v1/categories/{$category->uuid}?token_company={$tenant->uuid}");
        $response->assertStatus(200);
    }
}
