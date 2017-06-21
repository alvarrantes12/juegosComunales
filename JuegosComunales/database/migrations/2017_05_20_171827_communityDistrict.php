<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommunityDistrict extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communityDistrict', function (Blueprint $table) {
            $table->integer('IDCommunity')->unsigned();
            $table->foreign('IDCommunity')->references('IDCommunity')->on('community');
            $table->integer('IDDistrict')->unsigned();
            $table->foreign('IDDistrict')->references('IDDistrict')->on('district');
            $table->timestamps();
            $table->primary(array('IDDistrict', 'IDCommunity'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('communityDistrict');
    }
}
