<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AthleteImg extends Model
{
  protected $table = 'AthleteImg';

  
    protected $fillable = [
        'IDPersona', 'imgPasaport', 'imgCF', 'imgCA'
    ];
}
