<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\ProvinceCity;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileAddressController extends Controller
{
    public function index()
    {
        $addresses = UserAddress::where('user_id', auth()->id())->get();

        return view('pages.home.profile.address.index', compact('addresses'));
    }

    public function create()
    {
        $provinces = ProvinceCity::where('parent_id', 0)->get();

        return view('pages.home.profile.address.create', compact('provinces'));
    }

    public function store(Request $request)
    {
        $userAddress = new UserAddress();
        $userAddress->user_id = Auth::id();
        $userAddress->city_id = $request->city_id;
        $userAddress->cellphone = $request->cellphone;
        $userAddress->title = $request->title;
        $userAddress->postal_code = $request->postal_code;
        $userAddress->address = $request->address;
        $userAddress->province_id = $request->province_id;
        $userAddress->save();
        return redirect()->route('home.panel.address.index')->with('success', 'آیتم جدید با موفقیت اضافه شد');;

    }

    public function getCities($province_id)
    {
        $cities = ProvinceCity::where('parent_id', $province_id)->get();
        return response()->json($cities);
    }
}
