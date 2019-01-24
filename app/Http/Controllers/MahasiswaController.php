<?php


namespace App\Http\Controllers;

use App\User;
use App\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // edit profile mahasiswa
    public function mahasiswa_edit_profile($id)
    {
        $user_mahasiswa = User::findOrFail($id);
        $mahasiswa = Mahasiswa::where('user_id', $user_mahasiswa->id)->first();
        // dd($mahasiswa);
        return view('mahasiswa.edit-profile', compact('user_mahasiswa', 'mahasiswa'));
    }

    public function mahasiswa_update_profile(Request $request, $id)
    {
        $user_mahasiswa = User::findOrFail($id);
        $mahasiswa = Mahasiswa::where('user_id', $user_mahasiswa->id)->first();
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' =>  ['required', 'digits_between:8,15'],
            'departmen' =>  ['required', 'string'],
            'year' =>  ['required', 'numeric'],
            'address' => ['required', 'string', 'min:10'],
        ]);
        $mahasiswa->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'departmen' => $request['departmen'],
            'year' => $request['year'],
            'address' => $request['address'],
        ]);

        $user_mahasiswa->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
        ]);
        
        $msg = 'profile berhasil di perbaharui!';
        return back()->with('msg', $msg);
    }
}
