<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->id('districtId');
            $table->string('districtName');
            $table->integer('divisionId');
         });
         DB::table('districts')->insert(
            array(
                'districtName' => 'Dhaka Sadar',
                'divisionId' => '1'
            )
            );

            DB::table('districts')->insert(
                array(
                    'districtName' => 'Savar',
                    'divisionId' => '1'
                )
                );

                DB::table('districts')->insert(
                    array(
                        'districtName' => 'Gazipur',
                        'divisionId' => '1'
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
        Schema::dropIfExists('districts');
    }
}
