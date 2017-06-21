<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SportEdition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('sportEdition', function (Blueprint $table) {
            $table->integer('IDSport')->unsigned();
            $table->foreign('IDSport')->references('IDSport')->on('sport');
            $table->integer('IDEdition')->unsigned();
            $table->foreign('IDEdition')->references('IDEdition')->on('edition');
            $table->timestamps();
            $table->primary(array('IDSport', 'IDEdition'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sportEdition');
    }
}
