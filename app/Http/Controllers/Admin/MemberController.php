<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class MemberController extends Controller
{
    public function index()
    {
        // $query = User::with('profile', 'subscribe')->where('role', '!=', 'admin')->orderBy('created_at', 'desc')->get();

        // foreach ($query as $q) {
        //     $status = $q->subscribe()->orderBy('created_at', 'desc')->first()->payment_status;
        //     dump($status);
        // }

        // dd("x");

        if (request()->ajax()) {
            $query = User::with('profile', 'subscribe')->where('role', '!=', 'admin')->orderBy('created_at', 'desc')->get();

            return Datatables::of($query)
                ->addColumn('no_telepon', function ($item) {
                    return $item->profile?->no_telepon ?? '-';
                })
                ->addColumn('nama_lengkap', function ($item) {
                    return $item->profile?->nama_lengkap ?? '-';
                })
                ->addColumn('action', function ($item) {
                    if ($item->is_active == 'pending') {
                        $html = '<button data-id="' . $item->id . '" id="confirm" class="btn btn-success">Konfirmasi</button>';
                    } else {
                        $html = '';
                    }

                    return '<div class="btn-group" role="group" aria-label="Basic example">
                                <a href="./member/detail/' . $item->id . '" class="btn btn-info">Detail</a>
                                ' . $html . '
                            </div>';
                })
                ->addColumn('status_pembayaran', function ($item) {
                    $paymentStatus = $item->subscribe()->orderBy('created_at', 'desc')->first()->payment_status;

                    if ($paymentStatus == 'unpaid') {
                        $color = 'danger';
                        $text = 'Unpaid';
                    } else if ($paymentStatus == 'pending') {
                        $color = 'warning';
                        $text = 'Pending';
                    } else if ($paymentStatus == 'paid') {
                        $color = 'success';
                        $text = 'Paid';
                    } else {
                        $color = 'secondary';
                        $text = '';
                    }

                    return "<span class='badge badge-$color'>$text</span>";
                })
                ->addColumn('is_active', function ($item) {
                    if ($item->is_active == 'inactive') {
                        $color = 'danger';
                        $text = 'Inactive';
                    } else if ($item->is_active == 'pending') {
                        $color = 'warning';
                        $text = 'Pending (Perlu Persetujuan Admin)';
                    } else if ($item->is_active == 'active') {
                        $color = 'success';
                        $text = 'Active';
                    } else {
                        $color = 'secondary';
                        $text = '';
                    }

                    return "<span class='badge badge-$color'>$text</span>";
                })
                ->rawColumns(['action', 'is_active', 'status_pembayaran'])
                ->make();
        }

        $data = [
            'active' => 'member',
        ];

        return view('admin.member.index', $data);
    }

    public function detail($id)
    {
        $user = User::with('profile')->findOrFail($id);

        $data = [
            'active' => 'member',
            'user' => $user
        ];

        return view('admin.member.detail', $data);
    }

    public function confirmMember($id)
    {
        $user = User::findOrFail($id);

        if ($user->is_active == 'pending') {
            $user->is_active = 'active';
            $user->save();
            return response()->json([
                'status' => 200,
                'message' => 'OK',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Not Found',
            ]);
        }
    }
}
