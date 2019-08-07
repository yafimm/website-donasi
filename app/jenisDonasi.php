<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenisDonasi extends Model
{
    protected $table = 'jenis_donasi';

    public $timestamps = false;

    protected $fillable = [
        'nama',
       ];

    public function donasi(){
      return $this->hasMany('App\Donasi', 'id_jenis_donasi', 'id');
    }
}
