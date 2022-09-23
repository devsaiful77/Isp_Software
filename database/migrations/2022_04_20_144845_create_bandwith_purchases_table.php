<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBandwithPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bandwith_purchases', function (Blueprint $table) {
            $table->id('productPurchase_id');
            $table->string('total_bandwith');
            $table->string('facebook_bandwith');
            $table->string('youtube_bandwith');
            $table->string('others_bandwith');
            $table->string('total_amount');
            $table->integer('purchaseForm_id');
            $table->integer('month_id');
            $table->string('year');
            $table->string('paid_amount');
            $table->integer('creator');
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
        Schema::dropIfExists('bandwith_purchases');
    }
}
