<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class athleteCategory extends Model
{
      protected $table = 'athleteCategory';

  
    protected $fillable = [
        'IDPersona', 'IDCategory',
    ];
}
