<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $user = User::whereId(Auth::id())->select('id', 'mobileNumber', 'name', 'lastName')->first();
        return response()->json($user, 200);
    }
}
