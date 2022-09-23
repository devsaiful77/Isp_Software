<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\UserService;
use Illuminate\Http\Request;

class RoleController extends Controller{
    public function addNewRoleForm(){
        $roles = (new UserService())->getRoleInformation(null);
        return view('user.role.role_add',compact('roles'));
    }

    public function editRoleInfoForm($id){
        $role = (new UserService())->getRoleInformation($id);
        return view('user.role.role_edit',compact('role'));
    }

    public function insertRoleInfoFormSubmit(Request $request){

        $this->validate($request, [
            'name' => 'required'
        ],[
            'name.required' => 'Please enter role name!'
        ]);

        (new UserService())->insertRoleInformation(
            $request['name']
        );
        
        $notification=array(
            'messege'=>'Role Save Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }

    public function updateRoleInfoFormSubmit(Request $request){

        // dd($request->all());
        (new UserService())->updateRoleInformation(
            $request->id,
            $request['name']
        );

        $notification=array(
            'messege'=>'Role Update Success!',
            'alert-type'=>'success',
        );
        return redirect()->route('role_new_form')->with($notification);
    
    }

    public function deleteRoleInfoFormSubmit(Request $request){
        $id = $request['modal_id'];
        (new UserService())->deleteRoleInformation($id);

        $notification=array(
            'messege'=>'Role Delete Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }
}
