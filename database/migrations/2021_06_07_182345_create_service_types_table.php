<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_types', function (Blueprint $table) {
            $table->id('serviceTypeId');
            $table->string('serviceName');
            
        });


        DB::table('service_types')->insert(
            array(
                'serviceName' => 'Internet Service'
            )
            );
            DB::table('service_types')->insert(
                array(
                    'serviceName' => 'Dish Cable Service'
                )
                );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_types');
    }
}
