<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pop_addresses', function (Blueprint $table) {
            $table->id('pop_id');
            $table->string('pop_name');
            $table->string('pop_email')->nullable();
            $table->string('pop_phone');
            $table->string('pop_address')->nullable();
            $table->boolean('pop_status')->default(1);
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
        Schema::dropIfExists('pop_addresses');
    }
}
