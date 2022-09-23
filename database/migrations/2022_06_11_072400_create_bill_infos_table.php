<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_infos', function (Blueprint $table) {
            $table->id('billAutoId');
            $table->integer('month_id');
            $table->integer('customerAutoId');
            $table->integer('packageId');
            $table->string('bill_amount');
            $table->string('year');
            $table->date('date');
            $table->string('creator');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('bill_infos');
    }
}
