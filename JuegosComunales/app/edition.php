<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class edition extends Model
{
     protected $table = 'edition';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'IDEdition', 'name', 'year', 'startDate', 'finishDate',
    ];
}
