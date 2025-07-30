<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\ProvinceCity;
use App\Models\UserAddress;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function address()
    {
        $addresses = UserAddress::where('user_id', auth()->id())->first();
        return response()->json($addresses, 200);
    }

    // public function checkCoupon(Request $request)
    // {
    //     $request->validate([
    //         'code' => 'required'
    //     ]);


    //     $result = $this->checkCoupons($request->code);

    //     if (array_key_exists('error', $result)) {
    //         Alert::alert($result['error'], 'دقت کنید');
    //     } else {
    //         Alert::success($result['success'], 'باتشکر');
    //     }
    //     return redirect()->back();
    // }


}
