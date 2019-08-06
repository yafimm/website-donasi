<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailPesan extends Model
{
    protected $table = 'detail_pesan';

    protected $fillable = [
        'id_pesan', 'id_user', 'isi_pesan',
    ];
}
