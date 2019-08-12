<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama', 'email' ,'deskripsi', 'foto','password', 'id_role', 'no_telp', 'no_rekening', 'gender', 'username'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

// ================== Untuk cek hak akses ================
    public function isDonatur(){
      if($this->id_role === 1){
           return true;
       }else{
           return false;
       }
    }

    public function isYayasan(){
      if($this->id_role === 2){
           return true;
       }else{
           return false;
       }
    }

    public function isHelpdesk(){
      if($this->id_role === 3){
           return true;
       }else{
           return false;
       }
    }

    public function isAdmin(){
      if($this->id_role === 4){
           return true;
       }else{
           return false;
       }
    }
// ===========================

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
