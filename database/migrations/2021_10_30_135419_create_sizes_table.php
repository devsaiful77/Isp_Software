<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->id('SizeId');
            $table->string('SizeName');
            $table->boolean('SizeStatus')->default(true);
            $table->string('remarks', 50)->nullable();
            $table->unsignedBigInteger('CateId');
            $table->unsignedBigInteger('BranId');
            $table->foreign('CateId')->references('CateId')->on('categories')->onDelete('cascade');
            $table->foreign('BranId')->references('BranId')->on('brands')->onDelete('cascade');
            $table->timestamps();

        });

        DB::table('sizes')->insert([
            'SizeName' => 'n/a' ,
            'CateId' => 1,
            'BranId' => 1,
        ]);

        DB::table('sizes')->insert([
            'SizeName' => 'na' ,
            'CateId' => 1,
            'BranId' => 2,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sizes');
    }
}
