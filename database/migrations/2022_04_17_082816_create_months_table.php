<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('months', function (Blueprint $table) {
            $table->bigIncrements('month_id');
            $table->string('month_name', 20);
            $table->string('bengla_name', 30);
            $table->timestamps();
        });

        DB::table('months')->insert(
            array(
                'month_name' => 'January',
                'bengla_name' => 'জানুয়ারি',
            )
        );
        DB::table('months')->insert(
            array(
                'month_name' => 'February',
                'bengla_name' => 'ফেব্রুয়ারী',
            )
        );
        DB::table('months')->insert(
            array(
                'month_name' => 'March',
                'bengla_name' => 'মার্চ',
            )
        );
        DB::table('months')->insert(
            array(
                'month_name' => 'April',
                'bengla_name' => 'এপ্রিল',
            )
        );
        DB::table('months')->insert(
            array(
                'month_name' => 'May',
                'bengla_name' => 'মে',
            )
        );
        DB::table('months')->insert(
            array(
                'month_name' => 'June',
                'bengla_name' => 'জুন',
            )
        );
        DB::table('months')->insert(
            array(
                'month_name' => 'July',
                'bengla_name' => 'জুলাই',
            )
        );
        DB::table('months')->insert(
            array(
                'month_name' => 'August',
                'bengla_name' => 'আগষ্ট',
            )
        );
        DB::table('months')->insert(
            array(
                'month_name' => 'September',
                'bengla_name' => 'সেপ্টেম্বর',
            )
        );
        DB::table('months')->insert(
            array(
                'month_name' => 'October',
                'bengla_name' => 'অক্টোবর',
            )
        );
        DB::table('months')->insert(
            array(
                'month_name' => 'November',
                'bengla_name' => 'নভেম্বর',
            )
        );
        DB::table('months')->insert(
            array(
                'month_name' => 'December',
                'bengla_name' => 'ডিসেম্বর',
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
        Schema::dropIfExists('months');
    }
}
