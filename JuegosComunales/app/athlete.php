<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class athlete extends Model
{
    protected $table = 'athlete';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'IDPerson', 'IDBloodType', 'weight', 'height', 'IDStatus',
    ];
  
}
