<?php

namespace App\PaymentGateway;

use App\Events\TransactionCreated;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Models\ProductVariation;
use Illuminate\Support\Facades\DB;

class Payment
{
    public function createOrder($amounts, $token, $gateway_name, $addressId)
    {
        try {
            DB::beginTransaction();
            $order = Order::create([
                'user_id' => auth()->id(),
                'coupon_id' => session()->has('coupon') ? session()->get('coupon.id') : null,
                'total_amount' => $amounts['total_amount'],
                'address_id' => $addressId,
                // 'delivery_amount' => $amounts['delivery_amount'],
                'coupon_amount' => $amounts['coupon_amount'],
                'paying_amount' => $amounts['paying_amount'],
                'payment_type' => 'online',
            ]);

            foreach (\Cart::getContent() as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->associatedModel->id,
                    'product_variation_id' => $item->attributes->id,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                    'subtotal' => ($item->quantity * $item->price)
                ]);
            }

            Transaction::create([
                'user_id' => auth()->id(),
                'order_id' => $order->id,
                'amount' => $amounts['paying_amount'],
                'token' => $token,
                'gateway_name' => $gateway_name
            ]);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return ['error' => $ex->getMessage()];
        }

        return ['success' => 'success!'];
    }

    public function generateAdmission()
    {
        $number = mt_rand(1000, 99999);
        if ($this->checkAdmission($number)) {
            return $this->generateAdmission();
        }
        return (string)$number;
    }

    public function checkAdmission($number)
    {
        return Order::where('admission_number', $number)->exists();
    }

    public function updateOrder($token, $refId)
    {
        try {
            DB::beginTransaction();

            $transaction = Transaction::where('token', $token)->firstOrFail();

            $transaction->update([
                'status' => 1,
                'ref_id' => $refId,
            ]);

            $order = Order::findOrFail($transaction->order_id);
            // dd($order);
            $order->update([
                'payment_status' => 1,
                'status' => 1,
                // 'admission_number' => $this->generateAdmission(),
            ]);
            // event(new TransactionCreated($transaction));


            foreach (\Cart::getContent() as $item) {
                $variation = ProductVariation::find($item->attributes->id);
                $variation->update([
                    'quantity' => $variation->quantity - $item->quantity
                ]);
            }

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return ['error' => $ex->getMessage()];
        }

        return [
            'success' => 'success!'
        ];
    }
}
