<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentSetting;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    public function index()
    {
        $data = [
            'active' => 'pengaturan-langganan'
        ];

        $paymentSetting = PaymentSetting::first();

        if ($paymentSetting) {
            $data['paymentSetting'] = $paymentSetting;
        } else {
            $data['paymentSetting'] = [
                'date_range' => 0,
                'price' => 0,
                'id' => 0
            ];
        }
        return view('admin.payment-setting.index', $data);
    }

    public function store(Request $request)
    {
        $price = str_replace(['Rp', '.', ' '], '', $request->price);

        if ($request->id == 0) {
            PaymentSetting::create([
                'id' => 1,
                'date_range' => $request->date_range,
                'price' => $price
            ]);
        } else {
            PaymentSetting::where('id', $request->id)->update([
                'id' => 1,
                'date_range' => $request->date_range,
                'price' => $price
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil Mengubah');
    }
}
