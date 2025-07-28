<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function newProducts()
    {
        $newProducts = Product::orderByDesc('created_at')
            ->where('is_active', 1)
            ->take(10)
            ->get();
        return response()->json($newProducts, 200);
    }
}
