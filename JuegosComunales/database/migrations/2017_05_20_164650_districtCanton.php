<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DistrictCanton extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districtCanton', function (Blueprint $table) {
           
            $table->integer('IDDistrict')->unsigned();
            $table->foreign('IDDistrict')->references('IDDistrict')->on('district');
            $table->integer('IDCanton')->unsigned();
            $table->foreign('IDCanton')->references('IDCanton')->on('canton');
            $table->timestamps();
            $table->primary(array('IDDistrict', 'IDCanton'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districtCanton');
    }
}
