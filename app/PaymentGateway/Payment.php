<?php

namespace App\PaymentGateway;

<<<<<<< HEAD
=======
use App\Events\TransactionCreated;
>>>>>>> 15e21d01f157215620e20ba7adb9439a4f7cbdee
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Models\ProductVariation;
use Illuminate\Support\Facades\DB;

class Payment
{
<<<<<<< HEAD
    public function createOrder($addressId, $amounts, $token, $gateway_name)
=======
    public function createOrder($amounts, $token, $gateway_name)
>>>>>>> 15e21d01f157215620e20ba7adb9439a4f7cbdee
    {
        try {
            DB::beginTransaction();

            $order = Order::create([
                'user_id' => auth()->id(),
<<<<<<< HEAD
                'address_id' => $addressId,
                'coupon_id' => session()->has('coupon') ? session()->get('coupon.id') : null,
                'total_amount' => $amounts['total_amount'],
                'delivery_amount' => $amounts['delivery_amount'],
=======
                'coupon_id' => session()->has('coupon') ? session()->get('coupon.id') : null,
                'total_amount' => $amounts['total_amount'],
                // 'delivery_amount' => $amounts['delivery_amount'],
>>>>>>> 15e21d01f157215620e20ba7adb9439a4f7cbdee
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

<<<<<<< HEAD
=======
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

>>>>>>> 15e21d01f157215620e20ba7adb9439a4f7cbdee
    public function updateOrder($token, $refId)
    {
        try {
            DB::beginTransaction();

            $transaction = Transaction::where('token', $token)->firstOrFail();

            $transaction->update([
                'status' => 1,
<<<<<<< HEAD
                'ref_id' => $refId
            ]);

            $order = Order::findOrFail($transaction->order_id);
            $order->update([
                'payment_status' => 1,
                'status' => 1
            ]);
=======
                'ref_id' => $refId,
            ]);

            $order = Order::findOrFail($transaction->order_id);
            // dd($order);
            $order->update([
                'payment_status' => 1,
                'status' => 1,
                'admission_number' => $this->generateAdmission(),
            ]);
            // event(new TransactionCreated($transaction));

>>>>>>> 15e21d01f157215620e20ba7adb9439a4f7cbdee

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

<<<<<<< HEAD
        return ['success' => 'success!'];
    }
}
=======
        return [
            'success' => 'success!'
        ];
    }
}
>>>>>>> 15e21d01f157215620e20ba7adb9439a4f7cbdee
