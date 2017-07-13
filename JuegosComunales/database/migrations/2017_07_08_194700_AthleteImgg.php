<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AthleteImgg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('AthleteImg', function (Blueprint $table) {
            $table->string('IDPerson')->unique()->primary();
             $table->string('imgPasaport',200); 
             $table->string('imgCF',200); 
             $table->string('imgCA',200); 
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('AthleteImg');
    }
}
