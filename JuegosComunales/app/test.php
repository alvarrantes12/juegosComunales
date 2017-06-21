<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    protected $table = 'test';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'IDTest', 'test',
    ];
}
