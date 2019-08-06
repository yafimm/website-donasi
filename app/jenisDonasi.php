<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenisDonasi extends Model
{
    protected $table = 'donasi';

    public $timestamps = false;

    protected $fillable = [
        'nama', 
       ];
}
