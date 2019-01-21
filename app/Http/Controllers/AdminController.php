<?php

namespace App\Http\Controllers;

use App\User;
use App\Admin;
use App\Dosen;
use App\Karyawan;
use App\Mahasiswa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

	public function listuser()
	{
		// return view('users.list');
		return 'list users page';
	}

	public function createuser()
	{
		return view('admin.create-user');
	}
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function storeuser(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'id_number' => ['required', 'digits_between:5,30'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' =>  ['required', 'digits_between:8,15'],
            'role' =>  ['required', 'string', 'min:5', 'max:10'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request['name'],
            'id_number' => $request['id_number'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'role' => $request['role'],
            'password' => Hash::make($request['password']),
        ]);

        switch ($user->role) {
            case "admin":
                Admin::create([
                    'user_id' => $user->id,
                    'name' => $request['name'],
                    'id_number' => $request['id_number'],
                    'email' => $request['email'],
                    'phone' => $request['phone'],
                ]);
                break;
            case "dosen":
                Dosen::create([
                    'user_id' => $user->id,
                    'name' => $request['name'],
                    'id_number' => $request['id_number'],
                    'email' => $request['email'],
                    'phone' => $request['phone'],
                ]);
                break;
            case "karyawan":
                Karyawan::create([
                    'user_id' => $user->id,
                    'name' => $request['name'],
                    'id_number' => $request['id_number'],
                    'email' => $request['email'],
                    'phone' => $request['phone'],
                ]);
                break;
            default:
                Mahasiswa::create([
                    'user_id' => $user->id,
                    'name' => $request['name'],
                    'id_number' => $request['id_number'],
                    'email' => $request['email'],
                    'phone' => $request['phone'],
                ]);
                break;
        }
        return back()->with('msg', 'user berhasil dibuat!');
    }
}
