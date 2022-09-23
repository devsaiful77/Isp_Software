<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customerAutoId');
            $table->string('customerID');
            $table->string('customerName');
            $table->string('fatherName')->nullable();;
            $table->string('email');
            $table->string('applicationDate');
            $table->string('phoneNo1');
            $table->string('phoneNo2')->nullable();;
            $table->string('connectionDate');
            $table->integer('type_of_connection_id')->default(0);
            $table->integer('type_of_connectivity_id')->default(0);
            $table->integer('connectionStatusId');
            $table->integer('customerOccupationId');
            $table->integer('serviceTypeId');
            $table->integer('packageId');
            $table->integer('divisionId');
            $table->integer('districtId');
            $table->integer('upazilaId');
            $table->integer('unionId');
            $table->integer('serviceAreaId');
            $table->integer('serviceSubAreaId');
            $table->integer('pop_id');
            $table->string('description')->nullable();
            $table->string('postCode')->nullable();
            $table->string('roadNo')->nullable();
            $table->string('houseNo')->nullable();
            $table->string('floorNo')->nullable();
            $table->string('plateNo')->nullable();
            $table->string('photo')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('nid')->nullable();
            $table->string('nid_patch')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
