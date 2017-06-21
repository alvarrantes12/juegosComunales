<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorySport extends Model
{
     protected $table = 'categorySport';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'IDCategory', 'IDSport',
    ];
}
