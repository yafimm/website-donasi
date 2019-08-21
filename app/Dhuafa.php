<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dhuafa extends Model
{
      protected $table = 'dhuafa';

      protected $fillable = [
          'id_user', 'nama', 'no_telp', 'gender', 'alamat'
      ];

      public function yayasan(){
          return $this->belongsTo('App\User', 'id_user');
      }

}
