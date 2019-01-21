<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'id_number', 'phone', 'role', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    public function dosen()
    {
        return $this->belongsTo('App\Dosen');
    }

    public function karyawan()
    {
        return $this->belongsTo('App\Karyawan');
    }

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa');
    }

    function isAdmin()
    {
        
        if ($this->role == "admin") return true;

        return false;
    }
}
