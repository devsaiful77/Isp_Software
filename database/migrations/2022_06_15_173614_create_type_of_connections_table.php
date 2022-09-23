<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeOfConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_of_connections', function (Blueprint $table) {
            $table->id('type_of_connection_id');
            $table->string('name')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        DB::table('type_of_connections')->insert(
            array(
                'name' => 'Wired'
            )
        );
        
        DB::table('type_of_connections')->insert(
            array(
                'name' => 'Wireless'
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
        Schema::dropIfExists('type_of_connections');
    }
}
