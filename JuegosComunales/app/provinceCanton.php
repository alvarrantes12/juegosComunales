<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provinceCanton extends Model
{
     protected $table = 'cantonProvince';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'IDCanton', 'IDProvince',
    ];
}
