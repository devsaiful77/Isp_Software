<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeOfConnectivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_of_connectivities', function (Blueprint $table) {
            $table->id('type_of_connectivity_id');
            $table->string('name')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        DB::table('type_of_connectivities')->insert(
            array(
                'name' => 'Shared'
            )
        );
        
        DB::table('type_of_connectivities')->insert(
            array(
                'name' => 'Dedicated'
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
        Schema::dropIfExists('type_of_connectivities');
    }
}
