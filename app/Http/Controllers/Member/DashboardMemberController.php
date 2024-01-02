<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardMemberController extends Controller
{
    public function index()
    {
        $subscribe = Subscription::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->first();

        $data = [
            'active' => 'dashboard',
            'subscribe' => $subscribe
        ];

        return view('member.dashboard.index', $data);
    }
}
