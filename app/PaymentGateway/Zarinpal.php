<?php

namespace App\PaymentGateway;

class Zarinpal extends Payment
{
    public function send($amounts, $addressId)
    {
        $data = array(
            'merchant_id' => MERCHANT_ID,
            'amount' => $amounts['paying_amount'] . 0,
            'callback_url' => 'https://shop.iran-tarabar.ir/payment-verify/zarinpal',
            'description' => 'خرید اینترنتی',
            "metadata" => ["email" => "info@email.com", "mobile" => "09121234567"],
        );

        $jsonData = json_encode($data);
        $ch = curl_init('https://payment.zarinpal.com/pg/v4/payment/request.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));
        $result = curl_exec($ch);
        $err = curl_error($ch);
        $result = json_decode($result, true, JSON_PRETTY_PRINT);
        curl_close($ch);
        // return dd($result);

        if ($err) {
            return ['error' => "cURL Error #:" . $err];
        } else {
            // return dd('true');
            if (empty($result['errors'])) {
                if ($result['data']['code'] == 100) {
                    $createOrder = parent::createOrder($amounts, $result['data']["authority"], 'zarinpal', $addressId);
                    if (array_key_exists('error', $createOrder)) {
                        return $createOrder;
                    }
                    return ['success' => 'https://payment.zarinpal.com/pg/StartPay/' . $result['data']["authority"]];
                }
            } else {
                return ['error' => 'ERR: ' . $result['data']['code']];
            }
        }
    }

    public function verify($authority, $amount)
    {
        $amount = $amount . 0;
        $MerchantID = MERCHANT_ID;

        $data = array('merchant_id' => $MerchantID, 'authority' => $authority, 'amount' => $amount);

        $jsonData = json_encode($data);
        $ch = curl_init('https://payment.zarinpal.com/pg/v4/payment/verify.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));
        $result = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        $result = json_decode($result, true);
        if (isset($result['data']) && !empty($result['data'])) {
            // تراکنش موفقیت‌آمیز
            $updateOrder = parent::updateOrder($authority, $result['data']['ref_id']);
            if (array_key_exists('error', $updateOrder)) {
                return $updateOrder;
            }
            \Cart::clear();
            return [
                'success' => 'پرداخت با موفقیت انجام شد.',
                'transaction_number' => $result['data']['ref_id']
            ];
        } elseif (isset($result['errors']) && !empty($result['errors'])) {
            // تراکنش ناموفق
            return [
                'error' => 'پرداخت با خطا مواجه شد',
                'transaction_number' => 0
            ];
        } else {
            // حالت غیرمنتظره
            return [
                'error' => 'نتیجه نامعتبر است',
                'transaction_number' => 0
            ];
        }
    }
}
