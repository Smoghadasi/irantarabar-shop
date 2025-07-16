<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select(['name', 'slug', 'icon'])
            ->where('is_active', 1)
            ->where('parent_id', 0)
            ->take(6)
            ->get();
        return response()->json($categories, 200);
    }
}
