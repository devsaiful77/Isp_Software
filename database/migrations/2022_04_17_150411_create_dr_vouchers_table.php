<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dr_vouchers', function (Blueprint $table) {
            $table->id('drVoucId');
            $table->unsignedBigInteger('transactionId');
            $table->unsignedBigInteger('drTypeId');
            $table->date('expenseDate');
            $table->float('amount',11,2);
            $table->integer('debitedTold');
            $table->integer('creditedFromId');
            $table->integer('expenseById');
            $table->integer('year');
            $table->integer('monthId');
            $table->string('voucherNo')->nullable();
            $table->string('voucherFilePath')->nullable();
            $table->unsignedBigInteger('creator');
            $table->integer('approve_Status')->default(1);
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
        Schema::dropIfExists('dr_vouchers');
    }
}
