<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_infos', function (Blueprint $table) {
            $table->id('paymentId');
            $table->integer('customerId');
            $table->integer('amount');
            $table->integer('paymentTypeId');
            $table->date('paymentDate');
            $table->integer('collectedById');
            $table->string('transactionNo')->nullable();
            $table->string('payMonth');
            $table->string('payYear');
            $table->string('creator');
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
        Schema::dropIfExists('payment_infos');
    }
}
