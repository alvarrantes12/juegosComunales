<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PersonTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personTest', function (Blueprint $table) {
            $table->string('IDPerson');
            $table->foreign('IDPerson')->references('IDPerson')->on('person');
            $table->integer('IDTest')->unsigned();
            $table->foreign('IDTest')->references('IDTest')->on('test');
            $table->timestamps();
            $table->primary(array('IDPerson', 'IDTest'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personTest');
    }
}
