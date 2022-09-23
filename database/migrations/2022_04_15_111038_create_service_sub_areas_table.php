<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceSubAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_sub_areas', function (Blueprint $table) {
            $table->id('serviceSubAreaId');
            $table->string('serviceSubAreaName');
            $table->string('serviceSubAreaRemarks');
            $table->integer('serviceAreaId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_sub_areas');
    }
}
