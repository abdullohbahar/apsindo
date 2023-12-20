<?php

namespace App\Http\Controllers\Guest;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Registrasi Anggota APSI'
        ];

        return view('guest.registration', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'unique:profiles,nidn',
            'email' => 'required:users,email',
            'nama_lengkap' => 'required',
            'no_telepon' => 'required:profiles,no_telepon',
            'password' => 'required|min:6|confirmed',
            'alamat' => 'required',
            'provinsi' => 'required',
            'universitas' => 'required',
            'foto' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $saveUser = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'member',
                'is_active' => 'inactive'
            ]);

            if ($request->has('foto')) {
                $file = $request->file('foto');
                $filename = date('His') . "." . $file->getClientOriginalExtension();
                $location = 'foto-profile/';
                $filepath = $location . $filename;
                $file->move($location, $filename);
                $foto = $filepath;
            } else {
                $foto = 'guest-assets/dummy-profile.jpg';
            }

            Profile::create([
                'user_id' => $saveUser->id,
                'nidn' => $request->nidn,
                'nama_lengkap' => $request->nama_lengkap,
                'no_telepon' => $request->no_telepon,
                'alamat' => $request->alamat,
                'provinsi' => $request->provinsi,
                'universitas' => $request->universitas,
                'foto' => $foto
            ]);

            Subscription::create([
                'user_id' => $saveUser->id,
                'information' => 'Langganan Awal',
                'total_price' => 90000,
                'metode_pembayaran' => '-',
                'payment_status' => 'unpaid'
            ]);

            DB::commit();

            return redirect()->route('login')->with('successDaftar', 'Berhasil Melakukan Pendaftaran');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Gagal Melakukan Pendaftaran');
        }
    }
}
