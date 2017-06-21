<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Athlete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('athlete', function (Blueprint $table) {
            $table->string('IDPerson')->unique()->primary();
            $table->foreign('IDPerson')->references('IDPerson')->on('person');
            $table->integer('IDBloodType')->unsigned();
            $table->foreign('IDBloodType')->references('IDBloodType')->on('bloodType');
            $table->double('weight');
            $table->double('height');
            $table->integer('IDStatus')->unsigned();
            $table->foreign('IDStatus')->references('IDStatus')->on('status');
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
        Schema::dropIfExists('athlete');
    }
}
