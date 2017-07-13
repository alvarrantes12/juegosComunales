<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personTest extends Model
{
     protected $table = 'personTest';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'IDPerson','IDTest',
    ];
}