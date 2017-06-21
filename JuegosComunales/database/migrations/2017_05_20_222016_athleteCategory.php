<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AthleteCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athleteCategory', function (Blueprint $table) {
           
            $table->string('IDPerson');
            $table->foreign('IDPerson')->references('IDPerson')->on('person');
            $table->integer('IDCategory')->unsigned();
            $table->foreign('IDCategory')->references('IDCategory')->on('category');
            $table->timestamps();
            $table->primary(array('IDPerson', 'IDCategory'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('athleteCategory');
    }
}
