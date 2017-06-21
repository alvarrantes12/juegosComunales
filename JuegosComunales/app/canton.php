<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class canton extends Model
{
    protected $table = 'canton';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'IDCanton', 'canton',
    ];
}