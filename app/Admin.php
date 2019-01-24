<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Model
{
    protected $fillable = [
        'user_id', 'name', 'id_number', 'email', 'phone', 'address', 
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
