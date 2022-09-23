<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id('BranId');
            $table->unsignedBigInteger('CateId');
            $table->string('BranName');
            $table->boolean('BranStatus')->default(true);
            $table->string('remarks', 50)->nullable();
            $table->foreign('CateId')->references('CateId')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });


        // Cement
        DB::table('brands')->insert([
            'BranName' => 'Holcim' ,
            'CateId' => 1
        ]);
        DB::table('brands')->insert([
            'BranName' => 'OPC' ,
            'CateId' => 1
        ]);
        DB::table('brands')->insert([
            'BranName' => 'Bengle' ,
            'CateId' => 1
        ]);

// Rod
        DB::table('brands')->insert([
            'BranName' => 'BSRM' ,
            'CateId' => 2
        ]);
        DB::table('brands')->insert([
            'BranName' => 'PSRM' ,
            'CateId' => 2
        ]);
        DB::table('brands')->insert([
            'BranName' => 'CSRM' ,
            'CateId' => 2
        ]);

// Tin
        DB::table('brands')->insert([
            'BranName' => 'Morgi Marka' ,
            'CateId' => 3
        ]);
        DB::table('brands')->insert([
            'BranName' => 'KY' ,
            'CateId' => 3
        ]);
        DB::table('brands')->insert([
            'BranName' => 'Horse' ,
            'CateId' => 3
        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
