<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    protected $table = 'status';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'IDStatus', 'status',
    ];
}
