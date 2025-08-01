<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::select(['id', 'image'])
            ->where('is_active', 1)
            ->where('type', 'app')
            ->take(6)
            ->get();
        return response()->json($banners, 200);
    }
}
