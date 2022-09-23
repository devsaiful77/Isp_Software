<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplainInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complain_infos', function (Blueprint $table) {

            $table->id('complainId');
            $table->string('cutomerAutoId');
            $table->string('mobileNo');
            $table->integer('assignById');
            $table->integer('assignToId');
            $table->integer('assignToSubId');
            $table->integer('assignToLabourId');
            $table->date('assignDate');
            $table->date('solvedDate');
            $table->string('complainDetails')->nullable();
            $table->boolean('complainStatus')->default(1);
            $table->boolean('status')->default(1);
            $table->string('inspectorComments')->nullable();
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
        Schema::dropIfExists('complain_infos');
    }
}
