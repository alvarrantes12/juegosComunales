<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sportType extends Model
{
     protected $table = 'sportType';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'IDSportType', 'sportType',
    ];
}
