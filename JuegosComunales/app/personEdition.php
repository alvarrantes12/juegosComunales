<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personEdition extends Model
{
     protected $table = 'personEdition';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'IDPerson','IDEdition',
    ];
}