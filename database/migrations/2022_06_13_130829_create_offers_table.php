<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id('offer_id');
            $table->string('title');
            $table->integer('type')->nullable();
            $table->string('url')->nullable();
            $table->date('date')->nullable();
            $table->string('remarks')->nullable();
            $table->string('description')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        DB::table('offers')->insert(
            array(
                'title' => 'ডিসকাউন্ট মূল্যে ইন্টারনেট ক্রয় করার বিশ্বস্ত মাধ্যম।',
                'type' => '1',
                'url' => 'https://www.youtube.com/embed/foqdyg32tuI'
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
        Schema::dropIfExists('offers');
    }
}
