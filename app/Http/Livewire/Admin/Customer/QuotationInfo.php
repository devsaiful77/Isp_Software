<?php

namespace App\Http\Livewire\Admin\Customer;

use App\Http\Controllers\Service\CompanyInfoService;
use App\Http\Controllers\Service\CustomerInfoService;
use App\Http\Controllers\Service\UserService;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\CustomerQuotation;
use Session;
use Auth;

class QuotationInfo extends Component
{
    public $quotationCustomerName, $quoatationMobileNo, $packageId, $remarks, $inspectionById, $cusQuotationId, $connnectionCost, $paidAmount;
    /*
    ===============
    Data Binding
    ===============
    */

    public function packages(){
        return $packages = (new CompanyInfoService())->getPackageInformation(null);
    }

    public function users(){
        return $users = (new UserService())->getUserInformation(null);
    }

    public function quotation(){
        return $quotaions = (new CustomerInfoService())->getQuotatedCustomerInformation(null);
    }

    public function deleteId($id){
      $this->deleteId = $id;
    }

    // ========== reset data ========
    public function resetField(){
      $this->quotationCustomerName = '';
      $this->packageId = '';
      $this->inspectionById = '';
      $this->quoatationMobileNo = '';
      $this->remarks = '';
    }

    // Quotation Add


    public function quotationSubmit(){
        //==== Form Validtion =====
        $this->validate([
            'quotationCustomerName' => 'required|max:50',
            'quoatationMobileNo' => 'required',
            'inspectionById' => 'required',
            'packageId' => 'required',
            'remarks' => 'required|max:255',
        ], [
            'customerName.required' => 'Please enter Customer Name!',
            'quoatationMobileNo.required' => 'Please enter Customer Mobile No!',

        ]);
        //==== Form Validtion =====
        $name = $this->quotationCustomerName;
        $packageId = $this->packageId;
        $inspectionById = $this->inspectionById;
        $mobileNo = $this->quoatationMobileNo;
        $assignBy = Auth::user()->id;
        $remarks = $this->remarks;
        $date =  Carbon::now();

        $result = (new CustomerInfoService())->insertNewQuotationOfferToCustomer($name, $mobileNo, $assignBy, $inspectionById, $date, $packageId, $remarks);
        // dd($result);
        Session::flash('success_store');
        $this->resetField();
    }
    // ========= Approve Qutation =========
    public function approveConfirm($id){
      $this->cusQuotationId = $id;
      $data = CustomerQuotation::where('cusQuotationId',$id)->first();
      $this->paidAmount = $data->paidAmount;
      $this->connnectionCost = $data->connnectionCost;
    }
    // ========= Approve Qutation =========
    public function approveDone(){
      $this->validate([
        'connnectionCost' => 'required|numeric|min:0',
        'paidAmount' => 'required|numeric|min:0|max:'.$this->connnectionCost,
      ]);

      //==== Form Validtion =====
      $connnectionCost = $this->connnectionCost;
      $paidAmount = $this->paidAmount;
      $cusQuotationId = $this->cusQuotationId;
      $status = 'approve';
      $assignBy = Auth::user()->id;



      $result = (new CustomerInfoService())->approveQuotationOfferToCustomer($connnectionCost, $paidAmount, $cusQuotationId, $assignBy,$status);
      // dd($result);
      Session::flash('success_store');
      $this->connnectionCost = "";
      $this->paidAmount = "";
      $this->emit('quotation_approve');

    }



    // ========= Delete Qutation =========
    public function deleteQutation(){
      CustomerQuotation::where('cusQuotationId',$this->cusQuotationId)->update([
        'delete_status' => 'suspend',
        'updated_at' => Carbon::now(),
      ]);
      $this->emit('quotation_remove');
    }


    public function render()
    {
        //
        $packages = $this->packages();
        $users = $this->users();
        $quotaions = $this->quotation();
        return view('livewire.admin.customer.quotation-info',compact('packages', 'users', 'quotaions'));
    }
}
