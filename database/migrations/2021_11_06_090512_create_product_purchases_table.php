<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_purchases', function (Blueprint $table) {
            $table->id('ProdPurcId');
            $table->integer('TransactionId');
            $table->float('TotalPrice', 11, 2)->nullable();
            $table->date('PurchaseDate')->nullable();
            $table->integer('VendorId')->nullable();
            $table->float('LabourCost', 11, 2)->nullable();
            $table->integer('PaymentType');
            $table->integer('BankId')->nullable();
            $table->integer('Discount');
            $table->integer('CarringCost');
            $table->integer('ToSaleId')->default(0);
            $table->string('DoNo', 40);
            $table->string('TruckNo', 40);
            $table->unsignedBigInteger('CreateById');
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
        Schema::dropIfExists('product_purchases');
    }
}
