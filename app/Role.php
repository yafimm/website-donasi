<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'Role';

    public $timestamps = false;

    protected $fillable = [
        'nama_role',
    ];
}
