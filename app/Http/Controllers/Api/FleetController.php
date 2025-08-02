<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Fleet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FleetController extends ApiController
{
    public function index()
    {
        $fleets = Fleet::select(['id', 'title'])->get();
        return $this->successResponse([
            'fleets' => $fleets,
            'fleet_default' => Auth::user()->fleet_id,
        ], 200);
    }
}
