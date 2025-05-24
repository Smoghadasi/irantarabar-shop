<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->take(10)->get();
        $newProducts = Product::orderByDesc('created_at')->where('is_active', 1)->take(10)->get();
        $instantOffers = Product::inRandomOrder()->where('is_active', 1)->take(5)->get();
        $indexTopBanners = Banner::where('type', 'index-top')->where('is_active', 1)->orderBy('priority')->get();
        $indexCenterBanners = Banner::where('type', 'index-center')->where('is_active', 1)->orderBy('priority')->take('2')->get();
        // return $indexCenterBanners;
        // return $newProducts;
        return view('pages.home.index', compact('categories', 'newProducts', 'instantOffers', 'indexTopBanners', 'indexCenterBanners'));
    }
}
