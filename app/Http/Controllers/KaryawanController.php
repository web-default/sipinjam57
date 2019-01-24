<?php

namespace App\Http\Controllers;

use App\User;
use App\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    // edit profile karyawan
    public function karyawan_edit_profile($id)
    {
        $user_karyawan = User::findOrFail($id);
        $karyawan = karyawan::where('user_id', $user_karyawan->id)->first();
        // dd($karyawan);
        return view('karyawan.edit-profile', compact('user_karyawan', 'karyawan'));
    }

    public function karyawan_update_profile(Request $request, $id)
    {
        $user_karyawan = User::findOrFail($id);
        $karyawan = karyawan::where('user_id', $user_karyawan->id)->first();
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' =>  ['required', 'digits_between:8,15'],
            'bagian' =>  ['required', 'string'],
            'address' => ['required', 'string', 'min:10'],
        ]);
        $karyawan->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'bagian' => $request['bagian'],
            'address' => $request['address'],
        ]);

        $user_karyawan->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
        ]);
        
        $msg = 'profile berhasil di perbaharui!';
        return back()->with('msg', $msg);
    }
}
