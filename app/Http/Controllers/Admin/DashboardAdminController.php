<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $inactive = User::where('role', '!=', 'admin')->where('is_active', 'inactive')->count();
        $active = User::where('role', '!=', 'admin')->where('is_active', 'active')->count();
        $pending = User::where('role', '!=', 'admin')->where('is_active', 'pending')->count();

        $data = [
            'active' => 'dashboard',
            'activeMember' => $active,
            'inactiveMember' => $inactive,
            'pendingMember' => $pending
        ];

        return view('admin.dashboard.index', $data);
    }
}
