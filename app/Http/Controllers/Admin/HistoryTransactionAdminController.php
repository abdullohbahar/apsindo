<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class HistoryTransactionAdminController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $keterangan = $request->keterangan;
            $status = $request->status;

            $query = Subscription::with('user.profile', 'paymentSetting')
                ->whereHas('user', function ($query) {
                    $query->where('role', '!=', 'admin');
                })
                ->when($keterangan, function ($query) use ($keterangan) {
                    $query->where('information', $keterangan);
                })
                ->when($status, function ($query) use ($status) {
                    $query->where('payment_status', $status);
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

    public function export(Request $request)
    {
        $subscribption = Subscription::with('user.profile', 'paymentSetting')
            ->whereHas('user', function ($query) {
                $query->where('role', '!=', 'admin');
            })
            ->where('payment_status', 'paid')
            ->whereMonth('updated_at', $request->month)
            ->whereYear('updated_at', $request->year)
            ->orderBy('created_at', 'desc')
            ->get();

        $month = $this->konversiBulan($request->month);

        $data = [
            'subs' => $subscribption,
            'month' => $month,
            'year' => $request->year
        ];

        return view('admin.transaction-history.export', $data);
    }

    public function konversiBulan($bulan)
    {
        $namaBulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        return $namaBulan[$bulan] ?? 'Bulan tidak valid';
    }
}
