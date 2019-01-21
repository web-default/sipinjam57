<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Admin;
use App\Dosen;
use App\Karyawan;
use App\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'id_number' => ['required', 'digits_between:5,30'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' =>  ['required', 'digits_between:8,15'],
            'role' =>  ['required', 'string', 'min:5', 'max:10'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        /*
            return User::create([
                'name' => $data['name'],
                'id_number' => $data['id_number'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'role' => $data['role'],
                'password' => Hash::make($data['password']),
            ]);
        */

        $user = User::create([
            'name' => $data['name'],
            'id_number' => $data['id_number'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);

        switch ($user->role) {
            case "admin":
                return Admin::create([
                    'user_id' => $user->id,
                    'name' => $data['name'],
                    'id_number' => $data['id_number'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                ]);
                back();
                break;
            case "dosen":
                return Dosen::create([
                    'user_id' => $user->id,
                    'name' => $data['name'],
                    'id_number' => $data['id_number'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                ]);
                back();
                break;
            case "karyawan":
                return Karyawan::create([
                    'user_id' => $user->id,
                    'name' => $data['name'],
                    'id_number' => $data['id_number'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                ]);
                back();
                break;
            default:
                return Mahasiswa::create([
                    'user_id' => $user->id,
                    'name' => $data['name'],
                    'id_number' => $data['id_number'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                ]);
                back();
                break;
        }
    }
}
