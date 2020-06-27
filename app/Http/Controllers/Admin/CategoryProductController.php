<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryProductController extends Controller
{
    protected $product, $category;
    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;

        $this->middleware('can:products');
    }

    
    public function categories($idProduct){
        if(!$product = $this->product->find($idProduct))
            return redirect()->back();
            
        $categories = $product->categories()->paginate();
        return view('admin.pages.products.categories.categories', compact('product', 'categories'));
    }

    public function products($idCategory){
        if(!$category = $this->category->find($idCategory))
            return redirect()->back();

        $products = $category->products()->paginate();

        return view('admin.pages.categories.products.products', compact('category', 'products'));
    }

    public function categoriesAvailable($idProduct){
        if(!$product = $this->product->with('categories')->find($idProduct))
            return redirect()->back();

        $categories = $product->categoriesAvailable();

        return view('admin.pages.products.categories.available', compact('product', 'categories'));
    }


    public function attachCategoriesProduct(Request $request, $idProduct){
        $error = 'Precisa escolher pelo menos uma permissão';
        if(!$product = $this->product->with('categories')->find($idProduct))
            return redirect()->back();

        if(!$request->categories || count($request->categories) == 0)
            return redirect()->back()->with('error');

        $product->categories()->attach($request->categories);

        return redirect()->route('products.categories', $product->id);
    }

    public function detachCategoryProduct($idProduct, $idCategory){
        $product = $this->product->find($idProduct);
        $category = $this->category->find($idCategory);

        if(!$product || !$category)
            return redirect()->back();

        $product->categories()->detach($category);
        return redirect()->route('products.categories', $product->id);
    }
}
