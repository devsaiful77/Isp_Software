<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->id('divisionId');
            $table->string('divisionName');
             
        });

        DB::table('divisions')->insert(
            array(
                'divisionName' => 'Dhaka'
            )
            );
            DB::table('divisions')->insert(
                array(
                    'divisionName' => 'Khulna' 
                )
                );


                DB::table('divisions')->insert(
                    array(
                        'divisionName' => 'Borishal'
                    )
                    );


                    DB::table('divisions')->insert(
                        array(
                            'divisionName' => 'Rajshahi'
                        )
                        );

                        DB::table('divisions')->insert(
                            array(
                                'divisionName' => 'Chattrogram'
                            )
                            );

                            DB::table('divisions')->insert(
                                array(
                                    'divisionName' => 'Rangpur'
                                )
                                );

                                DB::table('divisions')->insert(
                                    array(
                                        'divisionName' => 'MymEnsingh'
                                    )
                                    );

                                    DB::table('divisions')->insert(
                                        array(
                                            'divisionName' => 'Sylhet'
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
        Schema::dropIfExists('divisions');
    }
}
