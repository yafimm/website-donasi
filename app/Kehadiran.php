<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    protected $table = 'kehadiran';

    public $timestamps = false;

    protected $fillable = [
        'id_pegawai', 'jam_kehadiran',
      ];
}
