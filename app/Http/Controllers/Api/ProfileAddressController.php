<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\ProvinceCity;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileAddressController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses = UserAddress::where('user_id', auth()->id())->get();
        return $this->successResponse($addresses, 200);
    }

    public function province()
    {
        $provinces = ProvinceCity::where('parent_id', 0)->get();
        return $this->successResponse($provinces, 200);
    }

    public function provinceCities($province_id)
    {
        $provinces = ProvinceCity::where('parent_id', $province_id)->get();
        return $this->successResponse($provinces, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'province_id' => 'required|integer',
            'city_id' => 'required|integer',
        ]);
        $userAddress = new UserAddress();
        $userAddress->user_id = Auth::id();
        $userAddress->city_id = $request->city_id;
        $userAddress->cellphone = $request->cellphone;
        $userAddress->title = $request->title;
        $userAddress->postal_code = $request->postal_code;
        $userAddress->address = $request->address;
        $userAddress->province_id = $request->province_id;
        $userAddress->save();
        return $this->successResponse($userAddress, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserAddress $userAddress)
    {
        $userAddress->user_id = Auth::id();
        $userAddress->city_id = $request->city_id;
        $userAddress->cellphone = $request->cellphone;
        $userAddress->title = $request->title;
        $userAddress->postal_code = $request->postal_code;
        $userAddress->address = $request->address;
        $userAddress->province_id = $request->province_id;
        $userAddress->save();
        return $this->successResponse($userAddress, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
