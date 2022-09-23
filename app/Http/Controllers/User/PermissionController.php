<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\UserService;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller{
    public function addNewPermissionForm(){
        $roles = (new UserService())->getRoleInformation(null);
        $permissions = (new UserService())->getPermissionInformation(null);
        return view('user.permission.permission_add',compact('permissions','roles'));
    }

    public function editPermissionInfoForm($id){
        $roles = (new UserService())->getRoleInformation(null);
        $permission = (new UserService())->getPermissionInformation($id);
        return view('user.permission.permission_edit',compact('permission','roles'));
    }

    public function insertPermissionInfoFormSubmit(Request $request){

        //dd($request->all());

        $this->validate($request, [
            'role_id' => 'required|numeric|unique:permissions,role_id'
        ],[
            'role_id.required'=>'Please enter select permission role!',
        ]);

        Permission::create($request->all());
        
        $notification=array(
            'messege'=>'Permission Save Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }

    public function updatePermissionInfoFormSubmit(Request $request){

        // dd($request->all());

        $request->validate([
            'role_id' => 'required|exists:permissions,role_id'
        ],[
            'role_id.required'=>'Please enter select permission role!',
        ]);

        $id = $request['id'];
        
        Permission::findOrFail($id)->update($request->all());

        $notification=array(
            'messege'=>'Permission Update Success',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    
    }

    public function deletePermissionInfoFormSubmit(Request $request){
        $id = $request['modal_id'];
        (new UserService())->deletePermissionInformation($id);

        $notification=array(
            'messege'=>'Permission Delete Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }
}
