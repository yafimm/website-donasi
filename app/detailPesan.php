<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailPesan extends Model
{
    protected $table = 'detail_pesan';

    protected $fillable = [
        'id_pesan', 'id_user', 'isi_pesan',
    ];

    public function pesan(){
        return $this->belongsTo('App\Pesan', 'id_pesan');
    }

    public function user(){
        return $this->belongsTo('App\User', 'id_user');
    }
}
