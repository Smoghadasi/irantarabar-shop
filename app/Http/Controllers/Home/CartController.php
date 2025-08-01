<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\ProvinceCity;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Cart;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function index()
    {
        return view('pages.home.cart.index');
    }
    public function add(Request $request)
    {
        // return $request;
        $request->validate([
            'product_id' => 'required',
            'qtybutton' => 'required'
        ]);

        $product = Product::findOrFail($request->product_id);
        $productVariation = ProductVariation::findOrFail(json_decode($request->variation)->id);

        if ($request->qtybutton > $productVariation->quantity) {
            Alert::alert('تعداد وارد شده از محصول درست نمی باشد', 'دقت کنید');
            return redirect()->back();
        }

        $rowId = $product->id . '-' . $productVariation->id;

        if (Cart::get($rowId) == null) {
            Cart::add(array(
                'id' => $rowId,
                'name' => $product->name,
                'price' => $productVariation->is_sale ? $productVariation->sale_price : $productVariation->price,
                'quantity' => $request->qtybutton,
                'attributes' => $productVariation->toArray(),
                'associatedModel' => $product
            ));
        } else {
            Alert::alert('محصول مورد نظر به سبد خرید شما اضافه شده است', 'دقت کنید');
            return redirect()->back();
        }

        // alert()->success('محصول مورد نظر به سبد خرید شما اضافه شد', 'باتشکر');
        return redirect()->back();
    }

    public function checkCoupon(Request $request)
    {
        $request->validate([
            'code' => 'required'
        ]);

        if (!auth()->check()) {
            Alert::alert('برای استفاده از کد تخفیف نیاز هست ابتدا وارد وب سایت شوید', 'دقت کنید');
            return redirect()->back();
        }

        $result = checkCoupon($request->code);

        if (array_key_exists('error', $result)) {
            Alert::alert($result['error'], 'دقت کنید');
        } else {
            Alert::success($result['success'], 'باتشکر');
        }
        return redirect()->back();
    }

    public function checkout()
    {
        if (\Cart::isEmpty()) {
            Alert::alert('سبد خرید شما خالی میباشد', 'دقت کنید');
            return redirect()->route('home');
        }

        $addresses = UserAddress::where('user_id', auth()->id())->get();
        $provinces = ProvinceCity::all();

        return view('pages.home.cart.checkout', compact('addresses', 'provinces'));
    }
    public function remove($rowId)
    {
        Cart::remove($rowId);

        Alert::success('محصول مورد نظر از سبد خرید شما حذف شد', 'باتشکر');
        return redirect()->back();
    }


    public function update(Request $request)
    {
        $request->validate([
            'qtybutton' => 'required'
        ]);

        foreach ($request->qtybutton as $rowId => $quantity) {

            $item = Cart::get($rowId);

            if ($quantity > $item->attributes->quantity) {
                Alert::alert('تعداد وارد شده از محصول درست نمی باشد', 'دقت کنید');
                return redirect()->back();
            }

            Cart::update($rowId, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $quantity
                ),
            ));
        }

        Alert::success('سبد خرید شما ویرایش شد', 'باتشکر');
        return redirect()->back();
    }
}
