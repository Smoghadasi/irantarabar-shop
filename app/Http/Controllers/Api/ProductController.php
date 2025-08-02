<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends ApiController
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
    }

    public function searchProduct(Request $request)
    {
        // return $request->fleet_ids;
        $products = Product::when(!empty($request->fleet_ids), function ($query) use ($request) {
            $query->whereHas('fleets', function ($q) use ($request) {
                $q->whereIn('fleets.id', $request->fleet_ids);
            });
        })
        ->when($request->name, function ($query) use ($request) {
            $query->where('products.name', 'like', '%' . $request->name . '%');
        })
        ->get();


        return $this->successResponse($products, 200);
    }

    public function showDetail($productId)
    {
        $product = Product::with('attributes', 'variations', 'images')->whereId($productId)->firstOrFail();
        return $this->successResponse($product, 200);
    }
}
