<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = 'pesan';

    protected $fillable = [
        'status',
    ];

    public function detail_pesan(){
        return $this->hasMany('App\detailPesan', 'id_pesan', 'id');
    }
}
