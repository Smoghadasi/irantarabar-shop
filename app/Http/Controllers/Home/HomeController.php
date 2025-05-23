<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->take(10)->get();
        $newProducts = Product::orderByDesc('created_at')->take(10)->get();
        // return $newProducts;
        return view('pages.home.index', compact('categories', 'newProducts'));
    }
}
