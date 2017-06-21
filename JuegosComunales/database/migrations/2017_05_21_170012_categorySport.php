<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategorySport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('categorySport', function (Blueprint $table) {
            $table->integer('IDCategory')->unsigned();
            $table->foreign('IDCategory')->references('IDCategory')->on('category');
            $table->integer('IDSport')->unsigned();
            $table->foreign('IDSport')->references('IDSport')->on('sport');
            $table->timestamps();
            $table->primary(array('IDCategory', 'IDSport'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorySport');
    }
}
