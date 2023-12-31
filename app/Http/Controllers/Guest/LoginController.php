<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Login Anggota APSI'
        ];

        return view('guest.login', $data);
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ], [
            'email.required' => ':attribute harus diisi',
            'password.required' => ':attribute harus diisi',
            'g-recaptcha-response.required' => 'Recaptcha harus diisi',
        ]);

        $auth = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($auth)) {
            $request->session()->regenerate();

            switch (Auth::user()->role) {
                case 'member':
                    return redirect()->route('member.dashboard');
                    break;
                case 'admin':
                    return redirect()->route('admin.dashboard');
                    break;
                default:
                    return redirect()->route('login')->with('error', 'Username atau password salah');
            }
        }

        return redirect()->route('login')->with([
            'error' =>  'email atau password salah',
            'email' => $request->email
        ]);
    }

    public function resetPassword()
    {
        $data = [
            'title' => 'Reset Password'
        ];

        return view('guest.reset-password', $data);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logout Successfully');
    }
}
