<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sportEdition extends Model
{
     protected $table = 'sportEdition';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'IDSport','IDEdition',
    ];
}
