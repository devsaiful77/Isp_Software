<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_quotations', function (Blueprint $table) {
            $table->id('cusQuotationId');
            $table->string('cutomerName');
            $table->string('mobileNo');
            $table->integer('assignById');
            $table->integer('assignToId');
            $table->integer('assignToSubId');
            $table->date('assignDate');
            $table->date('inspectionDate');
            $table->integer('connnectionCost');
            $table->integer('paidAmount');
            $table->integer('packageId');
            $table->enum('delete_status',['reject','suspend','normal'])->default('normal');
            $table->enum('status',['active','inactive','approve','pending'])->default('pending');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('customer_quotations');
    }
}
