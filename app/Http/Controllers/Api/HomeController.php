<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
// use App\Http\Controllers\Controller;
use App\Models\Product;
// use Illuminate\Http\Request;

class HomeController extends ApiController
{
    public function newProducts()
    {
        $newProducts = Product::orderByDesc('created_at')
            ->where('is_active', 1)
            ->take(10)
            ->get();

        return $this->successResponse($newProducts, 200);
    }
}
