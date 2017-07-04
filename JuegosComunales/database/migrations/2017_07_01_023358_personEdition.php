<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PersonEdition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personEdition', function (Blueprint $table) {
            $table->string('IDPerson');
            $table->foreign('IDPerson')->references('IDPerson')->on('person');
            $table->integer('IDEdition')->unsigned();
            $table->foreign('IDEdition')->references('IDEdition')->on('edition');
            $table->timestamps();
            $table->primary(array('IDPerson', 'IDEdition'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personEdition');
    }
}
