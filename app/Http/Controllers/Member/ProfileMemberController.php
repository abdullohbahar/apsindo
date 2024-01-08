<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class ProfileMemberController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $user = User::with('profile')->findOrFail($id);

        $sub = Subscription::where('user_id', $id)->where('payment_status', 'paid')->orderBy('created_at', 'desc')->first();

        $data = [
            'active' => 'profile',
            'user' => $user,
            'sub' => $sub
        ];

        return view('member.profile.index', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'universitas' => 'required',
        ]);

        if ($request->nidn != $request->old_nidn) {
            $request->validate([
                'nidn' => 'unique:profiles,nidn',
            ]);
        }

        if ($request->no_telepon != $request->old_no_telepon) {
            $request->validate([
                'no_telepon' => 'required:profiles,no_telepon',
            ]);
        }

        if ($request->email != $request->old_email) {
            $request->validate([
                'email' => 'required:users,email',
            ]);
        }

        try {
            DB::beginTransaction();

            $user = User::with('profile')->find($id);

            $user->update([
                'email' => $request->email
            ]);

            if ($request->file('foto')) {
                $file = $request->file('foto');
                $filename = date('His') . "." . $file->getClientOriginalExtension();
                $location = 'foto-profile/';
                $filepath = $location . $filename;
                $file->move($location, $filename);
                $foto = $filepath;
            } else {
                $foto = $user->profile->foto;
            }

            $user->profile->update([
                'nidn' => $request->nidn,
                'no_telepon' => $request->no_telepon,
                'nama_lengkap' => $request->nama_lengkap,
                'jenis_kelamin' => $request->jenis_kelamin,
                'status_kawin' => $request->status_kawin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'agama' => $request->agama,
                'provinsi' => $request->provinsi,
                'alamat' => $request->alamat,
                'jabatan' => $request->jabatan,
                'universitas' => $request->universitas,
                'foto' => $foto
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Berhasil Mengubah Foto');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updatePassword($id, Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        User::where('id', $id)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with('success', 'Berhasil Mengubah Password');
    }
}
