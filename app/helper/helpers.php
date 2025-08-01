<?php

use Carbon\Carbon;
use App\Models\City;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Province;



const MERCHANT_ID = "3d859c75-6bdf-433a-a50e-82d614b7a01a";

if (!function_exists('generateFileName')) {
    function generateFileName($name)
    {
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;
        $hour = Carbon::now()->hour;
        $minute = Carbon::now()->minute;
        $second = Carbon::now()->second;
        $microsecond = Carbon::now()->microsecond;
        return $year . '_' . $month . '_' . $day . '_' . $hour . '_' . $minute . '_' . $second . '_' . $microsecond . '_' . $name;
    }
}

if (!function_exists('convertShamsiToGregorianDate')) {
    function convertShamsiToGregorianDate($date)
    {
        if ($date == null) {
            return null;
        }
        $pattern = "/[-\s]/";
        $shamsiDateSplit = preg_split($pattern, $date);

        $arrayGergorianDate = verta()->getGregorian($shamsiDateSplit[0], $shamsiDateSplit[1], $shamsiDateSplit[2]);

        return implode("-", $arrayGergorianDate) . " " . $shamsiDateSplit[3];
    }
}

if (!function_exists('cartTotalSaleAmount')) {
    function cartTotalSaleAmount()
    {
        $cartTotalSaleAmount = 0;
        foreach (\Cart::getContent() as $item) {
            if ($item->attributes->is_sale) {
                $cartTotalSaleAmount += $item->quantity * ($item->attributes->price - $item->attributes->sale_price);
            }
        }

        return $cartTotalSaleAmount;
    }
}

if (!function_exists('cartTotalDeliveryAmount')) {
    function cartTotalDeliveryAmount()
    {
        $cartTotalDeliveryAmount = 0;
        foreach (\Cart::getContent() as $item) {
            $cartTotalDeliveryAmount += $item->associatedModel->delivery_amount;
        }

        return $cartTotalDeliveryAmount;
    }
}

if (!function_exists('cartTotalAmount')) {
    function cartTotalAmount()
    {
        if (session()->has('coupon')) {
            if (session()->get('coupon.amount') > (\Cart::getTotal() + cartTotalDeliveryAmount())) {
                return 0;
            } else {
                return (\Cart::getTotal() + cartTotalDeliveryAmount()) - session()->get('coupon.amount');
            }
        } else {
            return \Cart::getTotal() + cartTotalDeliveryAmount();
        }
    }
}

if (!function_exists('checkCoupon')) {
    function checkCoupon($code)
    {
        $coupon = Coupon::where('code', $code)->where('expired_at', '>', Carbon::now())->first();

        if ($coupon == null) {
            session()->forget('coupon');
            return ['error' => 'کد تخفیف وارد شده وجود ندارد'];
        }

        if (Order::where('user_id', auth()->id())->where('coupon_id', $coupon->code)->where('payment_status', 1)->exists()) {
            session()->forget('coupon');
            return ['error' => 'شما قبلا از این کد تخفیف استفاده کرده اید'];
        }

        if ($coupon->getRawOriginal('type') == 'amount') {
            session()->put('coupon', ['id' => $coupon->id, 'code' => $coupon->code, 'amount' => $coupon->amount]);
        } else {
            $total = \Cart::getTotal();

            $amount = (($total * $coupon->percentage) / 100) > $coupon->max_percentage_amount ? $coupon->max_percentage_amount : (($total * $coupon->percentage) / 100);

            session()->put('coupon', ['id' => $coupon->id, 'code' => $coupon->code, 'amount' => $amount]);
        }

        return ['success' => 'کد تخفیف برای شما ثبت شد'];
    }
}

// if (!function_exists('province_name')) {
//     function province_name($provinceId)
//     {
//         return Province::findOrFail($provinceId)->name;
//     }
// }

// if (!function_exists('city_name')) {
//     function city_name($cityId)
//     {
//         return City::findOrFail($cityId)->name;
//     }
// }
