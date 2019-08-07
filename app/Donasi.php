<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
  protected $table = 'donasi';

  protected $fillable = [
      'id_jenis_donasi', 'id_penerima', 'id_pengirim', 'bukti_pengiriman', 'status', 'gambar', 'deskripsi'
  ];

  public function jenis_donasi(){
      return $this->belongsTo('App\jenisDonasi', 'id_jenis_donasi');
  }

  public function penerima(){
      return $this->belongsTo('App\User', 'id_penerima');
  }

  public function pengirim(){
      return $this->belongsTo('App\User', 'id_pengirim');
  }

}
