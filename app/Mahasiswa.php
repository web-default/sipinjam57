<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
	protected $fillable = [
        'user_id', 'name', 'id_number', 'email', 'phone', 'departmen', 'year', 'address', 
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
