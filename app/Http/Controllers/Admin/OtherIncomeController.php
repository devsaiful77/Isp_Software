<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;

class OtherIncomeController extends Controller{
    public function addNewOtherIncomeForm(){
        $drTypes = (new CompanyInfoService())->getDrTypeInformation(null);
        $otherIncomes = (new CompanyInfoService())->getOtherIncomeInformation(null);
        return view('admin.other-income.other_income_add',compact('otherIncomes','drTypes'));
    }

    public function editOtherIncomeInfoForm($id){
        $drTypes = (new CompanyInfoService())->getDrTypeInformation(null);
        $otherIncome = (new CompanyInfoService())->getOtherIncomeInformation($id);
        return view('admin.other-income.other_income_edit',compact('otherIncome','drTypes'));
    }

    public function insertOtherIncomeInfoFormSubmit(Request $request){

        $this->validate($request, [
            'drTypeId' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ],[
            'drTypeId.required' => 'Please enter dr type!',
            'amount.required' => 'Please enter amount!',
            'date.required' => 'Please enter date!',
        ]);

        (new CompanyInfoService())->insertOtherIncomeInformation(
            $request['drTypeId'],
            $request['amount'],
            $request['date'],
        );
        
        $notification=array(
            'messege'=>'Service Area Save Success!',
            'alert-type'=>'success',
        );
        return redirect()->route('other_income_new_form')->with($notification);
    }

    public function updateOtherIncomeInfoFormSubmit(Request $request){

        // dd($request->all());
        (new CompanyInfoService())->updateOtherIncomeInformation(
            $request->otherIncomeId,
            $request['drTypeId'],
            $request['amount'],
            $request['date'],
        );

        $notification=array(
            'messege'=>'Service Area Update Success!',
            'alert-type'=>'success',
        );
        return redirect()->route('other_income_new_form')->with($notification);
    
    }

    public function deleteOtherIncomeInfoFormSubmit(Request $request){
        $id = $request['modal_id'];
        (new CompanyInfoService())->deleteOtherIncomeInformation($id);

        $notification=array(
            'messege'=>'Service Area Delete Success!',
            'alert-type'=>'success',
        );
        return redirect()->route('other_income_new_form')->with($notification);
    }
}
