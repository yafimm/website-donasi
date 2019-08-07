<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama', 'email', 'password', 'id_role', 'no_telp', 'no_rekening', 'gender', 'username'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Role', 'id_role');
    }

    public function pesan(){
        return $this->hasMany('App\Pesan', 'id_user', 'id');
    }

    public function donasiMengirim(){
        return $this->hasMany('App\Donasi', 'id_pengirim', 'id');
    }

    public function donasiPenerima(){
        return $this->hasMany('App\Donasi', 'id_penerima', 'id');
    }
}
