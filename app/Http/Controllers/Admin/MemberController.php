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
        if (request()->ajax()) {
            $query = User::with('profile')->where('role', '!=', 'admin')->orderBy('created_at', 'desc')->get();

            return Datatables::of($query)
                ->addColumn('no_telepon', function ($item) {
                    return $item->profile?->no_telepon ?? '-';
                })
                ->addColumn('nama_lengkap', function ($item) {
                    return $item->profile?->nama_lengkap ?? '-';
                })
                ->addColumn('action', function ($item) {
                    return '<div class="btn-group" role="group" aria-label="Basic example">
                                <a href="./member/detail/' . $item->id . '" class="btn btn-info">Detail</a>
                            </div>';
                })
                ->addColumn('is_active', function ($item) {
                    if ($item->is_active == 'inactive') {
                        $color = 'danger';
                    } else if ($item->is_active == 'pending') {
                        $color = 'warning';
                    } else if ($item->is_active == 'active') {
                        $color = 'success';
                    }

                    return "<span class='badge badge-$color'>$item->is_active</span>";
                })
                ->rawColumns(['action', 'is_active'])
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
}
