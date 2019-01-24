<?php

namespace App\Http\Controllers;

use App\User;
use App\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    // edit profile dosen
    public function dosen_edit_profile($id)
    {
        $user_dosen = User::findOrFail($id);
        $dosen = Dosen::where('user_id', $user_dosen->id)->first();
        // dd($dosen);
        return view('dosen.edit-profile', compact('user_dosen', 'dosen'));
    }

    public function dosen_update_profile(Request $request, $id)
    {
        $user_dosen = User::findOrFail($id);
        $dosen = Dosen::where('user_id', $user_dosen->id)->first();
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' =>  ['required', 'digits_between:8,15'],
            'bidang_ilmu' =>  ['required', 'string'],
            'address' => ['required', 'string', 'min:10'],
        ]);
        $dosen->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'bidang_ilmu' => $request['bidang_ilmu'],
            'address' => $request['address'],
        ]);

        $user_dosen->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
        ]);
        
        $msg = 'profile berhasil di perbaharui!';
        return back()->with('msg', $msg);
    }
}
