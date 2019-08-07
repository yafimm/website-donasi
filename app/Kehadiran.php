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

    public function user(){
        return $this->belongsto('App\Users', 'id_pegawai');
    }
}
