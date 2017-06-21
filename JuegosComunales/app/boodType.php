<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bloodType extends Model
{
    protected $table = 'bloodType';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'IDBloodType', 'bloodType',
    ];
}
