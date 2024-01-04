<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class HistoryTransactionAdminController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Subscription::with('user.profile', 'paymentSetting')
                ->whereHas('user', function ($query) {
                    $query->where('role', '!=', 'admin');
                })
                ->orderBy('created_at', 'desc')
                ->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    if ($item->payment_status == 'paid') {
                        $html = '<a href="./member/detail/' . $item->id . '" class="btn btn-info">Detail</a>';
                    } else {
                        $html = '-';
                    }

                    return '<div class="btn-group" role="group" aria-label="Basic example">
                                ' . $html . '
                            </div>';
                })
                ->addColumn('nama_lengkap', function ($item) {
                    return $item->user->profile->nama_lengkap;
                })
                ->addColumn('email', function ($item) {
                    return $item->user->email;
                })
                ->addColumn('no_telepon', function ($item) {
                    return $item->user->profile->no_telepon;
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
                ->rawColumns(['action', 'payment_status'])
                ->make();
        }

        $data = [
            'active' => 'riwayat'
        ];

        return view('admin.transaction-history.index', $data);
    }
}
