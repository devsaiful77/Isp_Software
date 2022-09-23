<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_infos', function (Blueprint $table) {
            $table->id('CompanyProfileId');
            $table->string('ComNameBangla');
            $table->string('ComNameEnlish');
            $table->string('CompanyTitle')->nullable();
            $table->string('CompanySubTitle')->nullable();
            $table->string('Address');
            $table->string('OwnerName1');
            $table->string('OwnerPhoto1');
            $table->string('OwnerName2');
            $table->string('OwnerPhoto2');
            $table->string('MobileNo1');
            $table->string('MobileNo2')->nullable();
            $table->string('Email1');
            $table->string('Email2')->nullable();
            $table->string('SupportMobileNumber');
            $table->string('Description')->nullable();
            $table->string('CompanyMission')->nullable();
            $table->string('CompanyVission')->nullable();
            $table->string('WebAddress');
            $table->string('TradeLicense')->nullable();
            $table->string('ISPLicense')->nullable();
            $table->string('Logo')->nullable();
            $table->string('Extra1')->nullable();
            $table->string('Extra2')->nullable();
            $table->string('Extra3')->nullable();
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
        Schema::dropIfExists('company_infos');
    }
}
