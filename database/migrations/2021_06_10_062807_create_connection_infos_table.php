<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectionInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connection_infos', function (Blueprint $table) {
            $table->id('connectionId');
            $table->string('ipAddress');
            $table->string('userId');
            $table->string('userPassword')->nullable();;
            $table->string('description')->nullable();
            $table->integer('customerId');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('connection_infos');
    }
}
