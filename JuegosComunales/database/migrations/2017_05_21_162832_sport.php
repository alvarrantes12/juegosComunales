<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('sport', function (Blueprint $table) {
            $table->increments('IDSport');
            $table->string('nameSport',25);
            $table->boolean('active');
            $table->integer('athletesAmount');
            $table->integer('IDSportType')->unsigned();
            $table->foreign('IDSportType')->references('IDSportType')->on('sportType');
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
         Schema::dropIfExists('sport');
    }
}
