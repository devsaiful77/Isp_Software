<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('EmployeeId');
            $table->string('EmployeeName');
            $table->string('FatherName')->nullable();;
            $table->string('EmpEmail');
            $table->string('PhoneNo1');
            $table->string('PhoneNo2')->nullable();;
            $table->date('JoinDate');
            $table->integer('DesignationId');
            $table->integer('DivisionId');
            $table->integer('DistrictId');
            $table->integer('UpazilaId');
            $table->string('Village');
            $table->string('PostOffice');
            $table->string('Details');
            $table->integer('ServiceAreaId');
            $table->integer('ServiceSubAreaId');
            $table->string('Photo')->nullable();;
            $table->string('NID')->nullable();
            $table->boolean('IsActive')->default('1');
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
        Schema::dropIfExists('employees');
    }
}
