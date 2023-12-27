<?php

namespace App\Http\Controllers\Member;

use Carbon\Carbon;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendNotifcationNewMemberToAdmin;
use App\Http\Controllers\WhatsappNotification;

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
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                $tahunDepan = Carbon::now()->addYear(1)->toDateString();

                $subscription = Subscription::find($trimmed_id);
                $subscription->payment_status = 'paid';
                $subscription->date_start = date('Y-m-d');
                $subscription->date_end = $tahunDepan;
                $subscription->amount = $request->gross_amount;
                $subscription->metode_pembayaran = $request->payment_type;
                $subscription->save();

                // Memperbarui kolom 'is_active' dari model User yang terkait dengan Subscription
                if ($subscription->user) {
                    $subscription->user->is_active = 'pending';
                    $subscription->user->save();
                }

                // kirim notif wa ke admin
                $dataAdmin = [
                    'subject' => 'Pembayaran',
                    'message' => 'Halo Admin, Ada Member Telah Melakukan Pembayaran Nih, Harap Lakukan Konfirmasi User',
                    'phone-number' => '085701223722'
                ];
                $whatsappNotificationController = new WhatsappNotification();
                $whatsappNotificationController->__invoke($dataAdmin);

                // kirim notif email ke admin
                Mail::to('abdullohbahar@gmail.com')->send(new sendNotifcationNewMemberToAdmin($dataAdmin));

                // kirim notif wa ke member
                $dataMember = [
                    'subject' => 'Pembayaran Berhasil',
                    'message' => 'Terimakasih Telah Melakukan Pembayaran. Harap Menunggu Konfirmasi Admin',
                    'phone-number' => $request->no_telepon
                ];
                $whatsappNotificationController->__invoke($dataMember);

                // kirim notif email ke member
                Mail::to($request->email)->send(new sendNotifcationNewMemberToAdmin($dataMember));
            } else if ($request->transaction_status == 'pending') {
                $subscription = Subscription::find($trimmed_id);
                $subscription->payment_status = 'pending';
                $subscription->save();
            }
        }
    }
}
