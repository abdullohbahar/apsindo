<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileMemberController extends Controller
{
    public function index()
    {
        $data = [
            'active' => 'profile'
        ];

        return view('member.profile.index', $data);
    }
}
