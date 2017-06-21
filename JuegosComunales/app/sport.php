<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sport extends Model
{
    protected $table = 'sport';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'IDSport', 'nameSport', 'active', 'IDSport',
    ];
}