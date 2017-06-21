<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CantonProvince extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cantonProvince', function (Blueprint $table) {
           
            $table->integer('IDCanton')->unsigned();
            $table->foreign('IDCanton')->references('IDCanton')->on('canton');
            $table->integer('IDProvince')->unsigned();
            $table->foreign('IDProvince')->references('IDProvince')->on('province');
            $table->timestamps();
            $table->primary(array('IDCanton', 'IDProvince'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cantonProvince');
    }
}
