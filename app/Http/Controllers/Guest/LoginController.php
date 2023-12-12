<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('guest.login');
    }

    public function resetPassword()
    {
        return view('guest.reset-password');
    }
}
