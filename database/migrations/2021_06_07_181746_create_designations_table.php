<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designations', function (Blueprint $table) {
            $table->id();
            $table->string('designationName');
            $table->boolean('isActive')->default(1);
           // $table->timestamps();
        });
 
        DB::table('designations')->insert(
            array(
                'designationName' => 'Supper Admin',
                'isActive' => '1'
            )
            );

            DB::table('designations')->insert(
                array(
                    'designationName' => 'Admin',
                    'isActive' => '1'
                )
                );

                DB::table('designations')->insert(
                    array(
                        'designationName' => 'Team Leader',
                        'isActive' => '1'
                    )
                    );

                    DB::table('designations')->insert(
                        array(
                            'designationName' => 'Support and Collection',
                            'isActive' => '1'
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
        Schema::dropIfExists('designations');
    }
}
