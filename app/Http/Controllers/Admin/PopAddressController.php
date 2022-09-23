<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Service\CompanyInfoService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PopAddressController extends Controller{

    public function addNewPopAddressForm(){
        $popAddresses = (new CompanyInfoService())->getPopAddressInformation(null);
        return view('admin.pop-address.pop_address_add',compact('popAddresses'));
    }

    public function editPopAddressInfoForm($id){
        $popAddress = (new CompanyInfoService())->getPopAddressInformation($id);
        return view('admin.pop-address.pop_address_edit',compact('popAddress'));
    }



    public function insertPopAddressInfoFormSubmit(Request $request){

        $this->validate($request, [
            'pop_name' => 'required',
            'pop_phone' => 'required',
        ],[
            'pop_name.required' => 'Please enter name!',
            'pop_phone.required' => 'Please enter phone!',
        ]);

        (new CompanyInfoService())->insertPopAddressInformation(
            $request['pop_name'],
            $request['pop_email'],
            $request['pop_phone'],
            $request['pop_address'],
        );
        
        $notification=array(
            'messege'=>'Pop Address Save Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }

    public function updatePopAddressInfoFormSubmit(Request $request){

        // dd($request->all());
        (new CompanyInfoService())->updatePopAddressInformation(
            $request->pop_id,
            $request['pop_name'],
            $request['pop_email'],
            $request['pop_phone'],
            $request['pop_address'],
        );

        $notification=array(
            'messege'=>'Pop Address Update Success!',
            'alert-type'=>'success',
        );
        return redirect()->route('pop_address_new_form')->with($notification);
    
    }

    public function deletePopAddressInfoFormSubmit(Request $request){
        $id = $request['modal_id'];
        (new CompanyInfoService())->deletePopAddressInformation($id);

        $notification=array(
            'messege'=>'Pop Address Delete Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }
}
