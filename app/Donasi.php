<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
  protected $table = 'donasi';

  protected $fillable = [
      'id_jenis_donasi', 'id_penerima', 'id_pengirim', 'bukti_pengiriman', 'status', 'gambar', 'deskripsi'
  ];
  
}
