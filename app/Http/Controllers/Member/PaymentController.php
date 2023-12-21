<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        $data = [
            'active' => ''
        ];

        return view('member.payment.index', $data);
    }

    public function payment($id)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = config('midtrans.is3ds');

        $subscription = Subscription::with('user.profile', 'paymentSetting')->findOrFail($id);

        $params = [
            'transaction_details' => [
                'order_id' => $id . '.' . rand(1, 9),
                'gross_amount' => $subscription->paymentSetting->price
            ],
            'customer_details' => [
                'first_name' => $subscription->user->profile->nama_lengkap,
                'email' => $subscription->user->email,
                'phone' => $subscription->user->profile->no_telepon,
                'address' => $subscription->user->profile->alamat,
            ],
            'product_details' => [
                'product_id' => $subscription->paymentSetting->id,
                'product_name' => 'APSI Subscription',
                'quantity' => $subscription->paymentSetting->date_range,
                'price' => $subscription->paymentSetting->price,
                'subtotal' => $subscription->paymentSetting->price,
            ]
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return response()->json($snapToken);
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.serverKey');
        $string = $request->order_id;
        $trimmed_id = substr($string, 0, -2);

        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            dd($hashed);
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                $subscription = Subscription::find($trimmed_id);
                $subscription->payment_status = 'paid';
                $subscription->save();

                // Memperbarui kolom 'is_active' dari model User yang terkait dengan Subscription
                if ($subscription->user) {
                    $subscription->user->is_active = 'pending';
                    $subscription->user->save();
                }
            }
        }
    }
}
