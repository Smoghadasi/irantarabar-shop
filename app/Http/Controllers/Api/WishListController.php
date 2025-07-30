<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function add(Product $product)
    {
        if ($product->checkUserWishlist(auth()->id())) {
            return response()->json('محصول مورد نظر به افزودن به لیست علاقه مندی ها اضافه شده است');
        } else {
            Wishlist::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id
            ]);

            return response()->json('محصول مورد نظر به لیست علاقه مندی ها شما اضافه شد', 200);
        }
    }

    public function remove(Product $product)
    {
        $wishlist = Wishlist::where('product_id', $product->id)->where('user_id', auth()->id())->firstOrFail();
        if ($wishlist) {
            Wishlist::where('product_id', $product->id)->where('user_id', auth()->id())->delete();
        }

        return response()->json('محصول مورد نظر از لیست علاقه مندی ها شما حذف شد');
    }

    public function usersProfileIndex()
    {
        $wishlists = Wishlist::where('user_id', auth()->id())->get();
        return response()->json($wishlists, 200);
    }
}
