<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    protected $table = 'province';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'IDProvince', 'province',
    ];
}
