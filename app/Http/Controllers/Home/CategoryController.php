<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Request $request, Category $category)
    {
        // dd($request->all());

        $attributes = $category->attributes()->where('is_filter', 1)->with('values')->get();
        $variation = $category->attributes()->where('is_variation', 1)->with('variationValues')->first();

        $products = $category->products()->filter()->search()->paginate(9);
        dd($products);

        return view('pages.home.categories.show', compact('category', 'attributes', 'variation', 'products'));
    }
}
