<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpazilasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upazilas', function (Blueprint $table) {
            $table->id('upazilaId');
            $table->string('upazilaName');
            $table->integer('districtId');
        });


        DB::table('upazilas')->insert(
            array(
                'upazilaName' => 'Gazipur',
                'districtId' => '1'
            )
            );

            DB::table('upazilas')->insert(
                array(
                    'upazilaName' => 'Savar',
                    'districtId' => '1'
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
        Schema::dropIfExists('upazilas');
    }
}
