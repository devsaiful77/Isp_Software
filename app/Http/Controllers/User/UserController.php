<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\UserService;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller{
    public function addNewUserForm(){
        $popAddresses = (new CompanyInfoService())->getPopAddressInformation(null);
        $roles = (new UserService())->getRoleInformation(null);
        $users = (new UserService())->getUserInformation(null);
        return view('user.user.user_add',compact('users','roles','popAddresses'));
    }

    public function editUserInfoForm($id){
        $popAddresses = (new CompanyInfoService())->getPopAddressInformation(null);
        $roles = (new UserService())->getRoleInformation(null);
        $user = (new UserService())->getUserInformation($id);
        return view('user.user.user_edit',compact('user','roles','popAddresses'));
    }

    public function insertUserInfoFormSubmit(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'role_id' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required'
        ],[
            'name.required' => 'Please enter name!',
            'role_id.required' => 'Please enter user role!',
            'email.required' => 'Please enter email!',
            'password.required' => 'Please enter password!',
            'password_confirmation.required' => 'Please enter confirm password!',
        ]);

        (new UserService())->insertUserInformation(
            $request['name'],
            $request['role_id'],
            $request['pop_id'],
            $request['email'],
            $request['phone'],
            $request['password'],
        );

        $notification=array(
            'messege'=>'User Create Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }

    public function updateUserInfoFormSubmit(Request $request){
        // dd($request->all());
        (new UserService())->updateUserInformation(
            $request->id,
            $request['name'],
            $request['role_id'],
            $request['pop_id'],
            $request['email'],
            $request['phone'],
            $request['password'],
        );

        $notification = array(
            'messege' => 'User Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('user_new_form')->with($notification);
    }

    public function deleteUserInformationFormSubmit(Request $request){
        $id = $request['modal_id'];
        (new UserService())->deleteUserInformation($id);

        $notification=array(
            'messege'=>'User Delete Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }









    //  ===================================================================
    //  ================== User Info API SECTION =======================
    //  ===================================================================


    public function saveUserInfo(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'role_id' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['success' => 'false', 'status_code' => '401', 'error' => 'error', 'message' => $validator->errors()]);
        }

        try{
            $name = $request->input('name');
            $role_id = $request->input('role_id');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $password = $request->input('password');

            $apackage = (new UserService())->insertUserInformation($name, $role_id, $email, $phone, $password);

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $apackage]);
        }
        catch(Exception $ex){
            return response()->json(['success' => 'false', 'status_code' => '500', 'message' => $ex->getMessage(), 'error' => 'error']);
        }
    }

    public function getUserInfo($id = null){
        try{
            if($id == null){
                $userInformations = (new UserService())->getUserInformation(null);
            }
            else{
                $user = (new UserService())->getUserInformation($id);
                $userInformations = array($user);
            }
            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $userInformations]);
        }
        catch(ModelNotFoundException $ex){
            return response()->json(['success' => 'false', 'status_code' => '404', 'error' => 'Invalid:Model Not Found']);
        }
        catch(Exception $ex){
            return response()->json(['success' => 'false', 'status_code' => '500', 'error' => $ex->getMessage()]);
        }
    }
}
