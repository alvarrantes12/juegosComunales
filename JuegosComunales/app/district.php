<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    protected $table = 'district';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'IDDistrict', 'district',
    ];
}

