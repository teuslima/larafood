<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\Api\TenantFormRequest;

class CategoryApiController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function categoriesByTenant(TenantFormRequest $request)
    {
        // if(!$request->token_company)
        //     return response()->json(['message' => 'Token Not Found'], 404);

        $categories = $this->categoryService->getCategoriesByUuid($request->token_company);
        return CategoryResource::collection($categories);
    }

    public function show(TenantFormRequest $request, $url)
    {
        if(!$category = $this->categoryService->getCategoryByUrl($url))
            return response()->json(['message' => 'Category Not Found'], 404); 

        return new CategoryResource($category);
    }
}
