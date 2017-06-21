<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table = 'role';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'IDRole', 'role',
    ];
}
