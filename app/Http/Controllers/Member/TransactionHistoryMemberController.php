<?php

namespace App\Http\Controllers\Member;

use DataTables;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionHistoryMemberController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Subscription::with('user.profile', 'paymentSetting')->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();

            return Datatables::of($query)
                ->addColumn('total_price', function ($item) {
                    if ($item->amount) {
                        $price = number_format($item->amount, 0, '', '.');
                    } else {
                        $price = number_format($item->paymentSetting->price, 0, '', '.');
                    }

                    return 'Rp ' . $price;
                })
                ->addColumn('action', function ($item) {
                    if ($item->payment_status == 'unpaid') {
                        $html = '<button id="payButton" data-id="' . $item->id . '" class="btn btn-primary">Bayar</button>';
                    } else if ($item->payment_status == 'pending') {
                        $html = '<a href="./member/detail/' . $item->id . '" class="btn btn-warning">Pending</a>';
                    } else if ($item->payment_status == 'paid') {
                        $html = '<a href="./member/detail/' . $item->id . '" class="btn btn-success">Lunas</a>';
                    } else {
                        $html = '-';
                    }

                    return '<div class="btn-group" role="group" aria-label="Basic example">
                                ' . $html . '
                            </div>';
                })
                ->addColumn('payment_status', function ($item) {
                    if ($item->payment_status == 'unpaid') {
                        $color = 'danger';
                    } else if ($item->payment_status == 'pending') {
                        $color = 'warning';
                    } else if ($item->payment_status == 'paid') {
                        $color = 'success';
                    } else {
                        $color = 'default';
                    }

                    return "<span class='badge badge-$color'>$item->payment_status</span>";
                })
                ->rawColumns(['action', 'payment_status', 'total_price'])
                ->make();
        }

        $data = [
            'active' => 'riwayat'
        ];

        return view('member.transaction-history.index', $data);
    }
}
