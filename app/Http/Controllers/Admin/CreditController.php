<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\AccountsService;
use Illuminate\Http\Request;

class CreditController extends Controller{

    public function addNewCreditForm(){
        $credits = (new AccountsService())->getCreditInformation(null);
        return view('admin.credit.credit_add',compact('credits'));
    }

    public function editCreditInfoForm($id){
        $credit = (new AccountsService())->getCreditInformation($id);
        return view('admin.credit.credit_edit',compact('credit'));
    }

    public function insertCreditInfoFormSubmit(Request $request){

        $this->validate($request, [
            'credit_head' => 'required',
        ],[
            'credit_head.required' => 'Please enter credit head!',
        ]);

        (new AccountsService())->insertCreditInformation(
            $request['credit_head'],
            $request['credit_remarks'],
        );
        
        $notification=array(
            'messege'=>'Credit Head Save Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }

    public function updateCreditInfoFormSubmit(Request $request){

        // dd($request->all());
        (new AccountsService())->updateCreditInformation(
            $request->credit_id,
            $request['credit_head'],
            $request['credit_remarks'],
        );

        $notification=array(
            'messege'=>'Credit Head Update Success!',
            'alert-type'=>'success',
        );
        return redirect()->route('credit_new_form')->with($notification);
    
    }

    public function deleteCreditInfoFormSubmit(Request $request){
        $id = $request['modal_id'];
        (new AccountsService())->deleteCreditInformation($id);

        $notification=array(
            'messege'=>'Credit Head Delete Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }


    
}
