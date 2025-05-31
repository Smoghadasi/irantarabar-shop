<?php

namespace App\PaymentGateway;

class Zarinpal extends Payment
{
<<<<<<< HEAD
    public function send($amounts, $addressId)
    {
        $data = array(
            'merchant_id' => 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX',
            'amount' => $amounts['paying_amount'] . 0,
            'callback_url' => 'http://localhost:8000/payment-verify/zarinpal',
            'description' => 'sfesf',
=======
    public function send($amounts, $description)
    {
        $data = array(
            'merchant_id' => 'ea354c6a-1c67-4c22-931b-5825e87277b8',
            'amount' => $amounts['paying_amount'] . 0,
            'callback_url' => 'https://offun.ir/payment-verify/zarinpal',
            'description' => $description,
>>>>>>> 15e21d01f157215620e20ba7adb9439a4f7cbdee
            "metadata" => ["email" => "info@email.com", "mobile" => "09121234567"],
        );

        $jsonData = json_encode($data);
<<<<<<< HEAD
        $ch = curl_init('https://sandbox.zarinpal.com/pg/v4/payment/request.json');
=======
        $ch = curl_init('https://payment.zarinpal.com/pg/v4/payment/request.json');
>>>>>>> 15e21d01f157215620e20ba7adb9439a4f7cbdee
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
<<<<<<< HEAD
            return dd('false');
=======
>>>>>>> 15e21d01f157215620e20ba7adb9439a4f7cbdee
            return ['error' => "cURL Error #:" . $err];
        } else {
            // return dd('true');
            if (empty($result['errors'])) {
                if ($result['data']['code'] == 100) {
<<<<<<< HEAD
                    $createOrder = parent::createOrder($addressId, $amounts, $result['data']["authority"], 'pay');
                    if (array_key_exists('error', $createOrder)) {
                        return $createOrder;
                    }
                    return ['success' => 'https://sandbox.zarinpal.com/pg/StartPay/' . $result['data']["authority"]];
                }
            } else {
                return $result;
=======
                    $createOrder = parent::createOrder($amounts, $result['data']["authority"], 'zarinpal');
                    if (array_key_exists('error', $createOrder)) {
                        return $createOrder;
                    }
                    return ['success' => 'https://payment.zarinpal.com/pg/StartPay/' . $result['data']["authority"]];
                }
            } else {
                return ['error' => 'ERR: ' . $result['data']['code']];
>>>>>>> 15e21d01f157215620e20ba7adb9439a4f7cbdee
            }
        }
    }

    public function verify($authority, $amount)
    {
        $amount = $amount . 0;
<<<<<<< HEAD
        $MerchantID = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
=======
        $MerchantID = 'ea354c6a-1c67-4c22-931b-5825e87277b8';
>>>>>>> 15e21d01f157215620e20ba7adb9439a4f7cbdee

        $data = array('merchant_id' => $MerchantID, 'authority' => $authority, 'amount' => $amount);

        $jsonData = json_encode($data);
<<<<<<< HEAD
        $ch = curl_init('https://sandbox.zarinpal.com/pg/v4/payment/verify.json');
=======
        $ch = curl_init('https://payment.zarinpal.com/pg/v4/payment/verify.json');
>>>>>>> 15e21d01f157215620e20ba7adb9439a4f7cbdee
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
<<<<<<< HEAD
        // dd($result['data']);
        if ($err) {
            return ['error' => "cURL Error #:" . $err];
        } else {
            if ($result['data']['code'] == 100 || $result['data']['code'] == 101) {
                $updateOrder = parent::updateOrder($authority, $result['data']['ref_id']);
                if (array_key_exists('error', $updateOrder)) {
                    return $updateOrder;
                }
                \Cart::clear();
                return [
                    'success' => 'پرداخت با موفقیت انجام شد.',
                    'transaction_number' => $result['data']['ref_id']
                ];
            } else {
                return [
                    'error' => 'پرداخت با خطا مواجه شد',
                    'transaction_number' => $result['data']['ref_id']
                ];
            }
        }
    }
}
=======
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
>>>>>>> 15e21d01f157215620e20ba7adb9439a4f7cbdee
