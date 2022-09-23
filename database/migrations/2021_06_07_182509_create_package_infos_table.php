<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_infos', function (Blueprint $table) {
            $table->id('packageId');
            $table->string('packageName');
            $table->string('bandwidth');
            $table->integer('price');
            $table->string('packageCode')->nullable();
            $table->integer('serviceTypeId');

        });


        DB::table('package_infos')->insert(
            array(
                'packageName' => 'Family Package',
                'bandwidth' => '15 MB',
                'price' => '1500',
                'packageCode' => 'FM-1001',
                'serviceTypeId' => '1'

            )
            );

            DB::table('package_infos')->insert(
                array(
                    'packageName' => 'double Package',
                    'bandwidth' => '10 MB',
                    'price' => '1000',
                    'packageCode' => 'DP-1111',
                    'serviceTypeId' => '1'
    
                )
                );


                DB::table('package_infos')->insert(
                    array(
                        'packageName' => 'single Package',
                        'bandwidth' => '5 MB',
                        'price' => '500',
                        'packageCode' => 'SP-3301',
                        'serviceTypeId' => '1'
        
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
        Schema::dropIfExists('package_infos');
    }
}
