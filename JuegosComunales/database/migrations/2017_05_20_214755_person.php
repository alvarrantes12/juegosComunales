<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Person extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('person', function (Blueprint $table) {
            $table->string('IDPerson')->unique()->primary();
            $table->string('name',25);
            $table->string('lastName1',12);
            $table->string('lastName2',12);
            $table->string('telephone',12) ->nullable();
            $table->string('email',30) ->nullable();
            $table->char('gender', 1);
            $table->date('birthDate');
            $table->string('address',255);
            $table->integer('IDCommunity')->unsigned();
            $table->foreign('IDCommunity')->references('IDCommunity')->on('community');
            $table->integer('IDRole')->unsigned();
            $table->foreign('IDRole')->references('IDRole')->on('role');
            $table->boolean('active');
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
        Schema::dropIfExists('person');
    }
}
