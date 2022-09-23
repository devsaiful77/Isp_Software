<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\AccountsService;
use Illuminate\Http\Request;

class AccountsHeadController extends Controller{

    public function addNewAccountsHeadForm(){
        $accountsHeads = (new AccountsService())->getAccountsHeadInformation(null);
        return view('admin.accounts-head.accounts_head_add',compact('accountsHeads'));
    }

    public function editAccountsHeadInfoForm($id){
        $accountsHead = (new AccountsService())->getAccountsHeadInformation($id);
        return view('admin.accounts-head.accounts_head_edit',compact('accountsHead'));
    }

    public function insertAccountsHeadInfoFormSubmit(Request $request){

        $this->validate($request, [
            'account_head_title' => 'required',
            'account_number' => 'required',
        ],[
            'account_head_title.required' => 'Please enter accounts head tilte!',
            'account_number.required' => 'Please enter accounts number!',
        ]);

        (new AccountsService())->insertAccountsHeadInformation(
            $request['account_head_title'],
            $request['account_number'],
        );
        
        $notification=array(
            'messege'=>'Accounts Head Save Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }

    public function updateAccountsHeadInfoFormSubmit(Request $request){

        // dd($request->all());
        (new AccountsService())->updateAccountsHeadInformation(
            $request->account_id,
            $request['account_head_title'],
            $request['account_number'],
        );

        $notification=array(
            'messege'=>'Accounts Head Update Success!',
            'alert-type'=>'success',
        );
        return redirect()->route('accounts_head_new_form')->with($notification);
    
    }

    public function deleteAccountsHeadInfoFormSubmit(Request $request){
        $id = $request['modal_id'];
        (new AccountsService())->deleteAccountsHeadInformation($id);

        $notification=array(
            'messege'=>'Accounts Head Delete Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }



}
