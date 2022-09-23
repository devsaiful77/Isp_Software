<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_records', function (Blueprint $table) {
            $table->id('PurcRecoId');
            $table->integer('Quantity')->nullable();
            $table->float('UnitPrice', 11, 2)->nullable();
            $table->float('Amount', 11, 2)->nullable();
            $table->string('description', 250)->nullable();
            $table->boolean('deviceStatus')->default(true);


            $table->unsignedBigInteger('ProdPurcId');
            $table->unsignedBigInteger('CateId');
            $table->unsignedBigInteger('BranId');
            $table->unsignedBigInteger('SizeId');
            /* Foreign Key */
            $table->foreign('ProdPurcId')->references('ProdPurcId')->on('product_purchases')->onDelete('cascade');
            $table->foreign('CateId')->references('CateId')->on('categories')->onDelete('cascade');
            $table->foreign('BranId')->references('BranId')->on('brands')->onDelete('cascade');
            $table->foreign('SizeId')->references('SizeId')->on('sizes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_records');
    }
}
