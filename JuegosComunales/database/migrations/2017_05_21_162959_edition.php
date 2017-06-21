<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Edition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('edition', function (Blueprint $table) {
            $table->increments('IDEdition');
            $table->string('nameEdition',25);
            $table->integer('year');
            $table->date('startDate');
            $table->date('endDate');
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
        Schema::dropIfExists('edition');
    }
}
