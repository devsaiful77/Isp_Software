<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\AccountsService;
use Illuminate\Http\Request;

class DebitController extends Controller{

    public function addNewDebitForm(){
        $debits = (new AccountsService())->getDebitInformation(null);
        return view('admin.debit.debit_add',compact('debits'));
    }

    public function editDebitInfoForm($id){
        $debit = (new AccountsService())->getDebitInformation($id);
        return view('admin.debit.debit_edit',compact('debit'));
    }

    public function insertDebitInfoFormSubmit(Request $request){

        $this->validate($request, [
            'debit_head' => 'required',
        ],[
            'debit_head.required' => 'Please enter debit head!',
        ]);

        (new AccountsService())->insertDebitInformation(
            $request['debit_head'],
            $request['debit_remarks'],
        );
        
        $notification=array(
            'messege'=>'Debit Head Save Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }

    public function updateDebitInfoFormSubmit(Request $request){

        // dd($request->all());
        (new AccountsService())->updateDebitInformation(
            $request->debit_id,
            $request['debit_head'],
            $request['debit_remarks'],
        );

        $notification=array(
            'messege'=>'Debit Head Update Success!',
            'alert-type'=>'success',
        );
        return redirect()->route('debit_new_form')->with($notification);
    
    }

    public function deleteDebitInfoFormSubmit(Request $request){
        $id = $request['modal_id'];
        (new AccountsService())->deleteDebitInformation($id);

        $notification=array(
            'messege'=>'Debit Head Delete Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }
}
