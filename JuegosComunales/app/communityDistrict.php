<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class communityDistrict extends Model
{
     protected $table = 'communityDistrict';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'IDCommunity', 'IDDistrict',
    ];
}
