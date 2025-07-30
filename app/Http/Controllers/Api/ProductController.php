<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Request $request, Category $category)
    {
        $attributes = $category->attributes()->where('is_filter', 1)->with('values')->get();
        $variation = $category->attributes()->where('is_variation', 1)->with('variationValues')->first();
        $products = $category->products()->filter()->search()->paginate(9);

        return [
            'category' => $category,
            'attributes' => $attributes,
            'variation' => $variation,
            'products' => $products,
        ];

        // return view('pages.home.categories.show', compact('category', 'attributes', 'variation', 'products'));
    }

    public function searchProduct(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->name . '%')->get();
        return response()->json($products, 200);
    }
}
