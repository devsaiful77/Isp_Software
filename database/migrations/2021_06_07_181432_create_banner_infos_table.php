<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_infos', function (Blueprint $table) {
            $table->id('bannerId');
            $table->string('bannerName');
            $table->string('bannerTitle');
            $table->string('bannerSubTitle');
            $table->string('bannerUrl');
            $table->string('bannerImage');
            $table->boolean('isActive')->default(1);
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
        Schema::dropIfExists('banner_infos');
    }
}
