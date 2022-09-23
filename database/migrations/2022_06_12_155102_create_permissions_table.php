<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->longText('permission');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        DB::table('permissions')->insert(
            array(
                'role_id' => '1',
                'permission' => '{"companyprofile":{"manage":"1"},"companyinformation":{"manage":"1"},"banner":{"add":"1","edit":"1","delete":"1","manage":"1"},"offerpublishwebsite":{"publishoffer":"1","add":"1","edit":"1","delete":"1","manage":"1"},"generalsetting":{"manage":"1"},"division":{"add":"1","edit":"1","delete":"1","manage":"1"},"district":{"add":"1","edit":"1","delete":"1","manage":"1"},"upazila":{"add":"1","edit":"1","delete":"1","manage":"1"},"union":{"add":"1","edit":"1","delete":"1","manage":"1"},"addconnectionstatus":{"add":"1","edit":"1","delete":"1","manage":"1"},"servicearea":{"add":"1","edit":"1","delete":"1","manage":"1"},"servicesubarea":{"add":"1","edit":"1","delete":"1","manage":"1"},"popinformation":{"add":"1","edit":"1","delete":"1","manage":"1"},"manageuser":{"manage":"1"},"usermanagement":{"add":"1","edit":"1","delete":"1","manage":"1"},"rolemanagement":{"add":"1","edit":"1","delete":"1","manage":"1"},"permissionmanageuser":{"add":"1","edit":"1","delete":"1","manage":"1"},"servicetype":{"add":"1","edit":"1","delete":"1","manage":"1"},"packageinformation":{"add":"1","edit":"1","delete":"1","manage":"1"},"customer":{"manage":"1"},"addcustomer":{"add":"1","edit":"1","delete":"1","manage":"1"},"newcustomerapproval":{"manage":"1"},"customerstatusupdate":{"manage":"1"},"customerbill":{"manage":"1"},"billgenerate":{"manage":"1"},"billcollection":{"add":"1","edit":"1","delete":"1","manage":"1"},"reports":{"manage":"1"},"bandwithpurchase":{"add":"1","edit":"1","delete":"1","manage":"1"},"accounts":{"manage":"1"}}'
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
        Schema::dropIfExists('permissions');
    }
}
