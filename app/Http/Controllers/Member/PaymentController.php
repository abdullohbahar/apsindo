<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $data = [
            'active' => ''
        ];

        return view('member.payment.index', $data);
    }

    public function payment()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = config('midtrans.is3ds');

        $params = [
            'transaction_details' => [
                'order_id' => strtotime(now()),
                'gross_amount' => 90000
            ],
            'customer_details' => [
                'first_name' => 'bahar',
                'email' => 'abdullohbahar@gmail.com',
                'phone' => '085701223722'
            ]
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $data = [
            'snapToken' => $snapToken
        ];

        return response()->json($snapToken);
    }
}
