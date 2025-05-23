<?php

use App\Http\Controllers\ProfileController;
use App\Routes\DashboardRoute;
use App\Routes\HomeRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Admin Panel
DashboardRoute::init();

// Home Page
HomeRoute::init();

require __DIR__.'/auth.php';
