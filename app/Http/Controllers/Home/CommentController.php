<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends Controller
{
    public function store(Request $request, Product $product)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'text' => 'required|min:5|max:7000',
        ]);

        if ($validator->fails()) {
            return redirect()->to(url()->previous() . '#comments')->withErrors($validator);
        }

        if (auth()->check()) {

            try {
                DB::beginTransaction();

                Comment::create([
                    'user_id' => auth()->id(),
                    'product_id' => $product->id,
                    'text' => $request->text
                ]);

                // if ($product->rates()->where('user_id', auth()->id())->exists()) {
                //     $productRate = $product->rates()->where('user_id', auth()->id())->first();
                //     $productRate->update([
                //         'rate' => $request->rate
                //     ]);
                // } else {
                //     ProductRate::create([
                //         'user_id' => auth()->id(),
                //         'product_id' => $product->id,
                //         'rate' => $request->rate
                //     ]);
                // }

                DB::commit();
            } catch (\Exception $ex) {
                DB::rollBack();
                Alert::alert('مشکل در ویرایش محصول', $ex->getMessage())->persistent('حله');
                return redirect()->back();
            }

            Alert::success('نظر ارزشمند شما با موفقیت برای این محصول ثبت شد', 'باتشکر');
            return redirect()->back();
        } else {
            Alert::alert('برای ثبت نظر نیاز هست در ابتدا وارد سایت شوید', 'دقت کنید')->persistent('حله');
            return redirect()->back();
        }
    }
}
