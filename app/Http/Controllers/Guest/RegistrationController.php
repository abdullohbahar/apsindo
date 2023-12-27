<?php

namespace App\Http\Controllers\Guest;

use Exception;
use App\Models\User;
use App\Models\Profile;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\PaymentSetting;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\WhatsappNotification;
use App\Mail\sendNotifcationNewMemberToAdmin;

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
                'payment_settings_id' => 1,
                'metode_pembayaran' => '-',
                'payment_status' => 'unpaid'
            ]);

            DB::commit();


            // kirim notif wa ke admin
            // $dataAdmin = [
            //     'subject' => 'Pengguna Baru',
            //     'message' => 'Halo Admin, Ada Member Baru Nih.',
            //     'phone-number' => '085701223722'
            // ];
            $whatsappNotificationController = new WhatsappNotification();
            // $whatsappNotificationController->__invoke($dataAdmin);

            // // kirim notif email ke admin
            // Mail::to('abdullohbahar@gmail.com')->send(new sendNotifcationNewMemberToAdmin($dataAdmin));

            // kirim notif wa ke member
            $dataMember = [
                'subject' => 'Pengguna Baru',
                'message' => 'Terimakasih Telah Melakukan Pendaftaran. Harap Lakukan Pembayaran',
                'phone-number' => $request->no_telepon
            ];
            $whatsappNotificationController->__invoke($dataMember);

            // kirim notif email ke member
            Mail::to($request->email)->send(new sendNotifcationNewMemberToAdmin($dataMember));

            return redirect()->route('login')->with('successDaftar', 'Berhasil Melakukan Pendaftaran');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Gagal Melakukan Pendaftaran');
        }
    }
}
