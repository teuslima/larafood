<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Requests\Api\TenantFormRequest;

class ProductApiController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    
    public function productByTenant(TenantFormRequest $request)
    {
        $products = $this->productService->getCategoriesByUuid($request->token_company);
        return ProductResource::collection($products);
    }
}
