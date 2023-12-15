<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $data = [
            'active' => 'member',
        ];

        return view('admin.member.index', $data);
    }
}
