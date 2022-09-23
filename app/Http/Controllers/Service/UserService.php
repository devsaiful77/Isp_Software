<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Carbon\Carbon;
use Auth;

class UserService extends Controller{
    public function getUserInformation($id){
        if ($id == null) {
            return User::where('status', 1)->get();
        } else {
            return User::where('id', $id)->where('status', 1)->first();
        }
    }

    public function insertUserInformation($name, $role_id, $pop_id, $email, $phone, $password){

        //dd($pop_id);
        return User::insertGetId([
            'name' => $name,
            'role_id' => $role_id,
            'pop_id' => $pop_id,
            'email' => $email,
            'phone' => $phone,
            'password'=>Hash::make($password),
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
    }

    public function updateUserInformation($id, $name, $role_id, $pop_id, $email, $phone, $password){
        return User::where('id', $id)->update([
            'name' => $name,
            'role_id' => $role_id,
            'pop_id' => $pop_id,
            'email' => $email,
            'phone' => $phone,
            'password'=>Hash::make($password),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
    }

    public function deleteUserInformation($id){
        return User::where('id', $id)->update([
            'status' => 0,
        ]);
    }


    // Role Management
    public function getRoleInformation($id){
        if ($id == null) {
            return Role::where('status', 1)->get();
        } else {
            return Role::where('id', $id)->where('status', 1)->first();
        }
    }

    public function insertRoleInformation($name){
        return Role::insertGetId([
            'name' => $name,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
    }

    public function updateRoleInformation($id, $name){
        return Role::where('id', $id)->update([
            'name' => $name,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
    }
    public function deleteRoleInformation($id){
        return Role::where('id', $id)->update([
            'status' => 0,
        ]);
    }


    // Permission Management
    public function getPermissionInformation($id){
        if ($id == null) {
            return Permission::where('status', 1)->get();
        } else {
            return Permission::where('id', $id)->where('status', 1)->first();
        }
    }

    public function insertPermissionInformation($role_id, $permission){
       // dd($permission);

        return Permission::insertGetId([
            'role_id' => $role_id,
            'permission' => $permission,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
    }

    public function updatePermissionInformation($id, $role_id){
        return Permission::where('id', $id)->update([
            'role_id' => $role_id,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
    }

    public function deletePermissionInformation($id){
        return Permission::where('id', $id)->update([
            'status' => 0,
        ]);
    }
}
