<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardMemberController extends Controller
{
    public function index()
    {
        $data = [
            'active' => 'dashboard'
        ];

        return view('member.dashboard.index', $data);
    }
}
