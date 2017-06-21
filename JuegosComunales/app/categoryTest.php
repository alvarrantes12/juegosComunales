<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoryTest extends Model
{
      protected $table = 'categoryTest';

  
    protected $fillable = [
        'IDTest', 'IDCategory',
    ];
}
