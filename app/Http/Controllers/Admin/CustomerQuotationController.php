<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Service\CompanyInfoService;
use App\Http\Controllers\Service\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CustomerInfoService;
use App\Http\Controllers\Service\DeviceInfoService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Carbon\Carbon;
use Cart;;


class CustomerQuotationController extends Controller
{
    public function customerQuotationForm()
    {
        $packages = (new CompanyInfoService())->getPackageInformation(null);
        $users = (new UserService())->getUserInformation(null);
        $quotaions = (new CustomerInfoService())->getQuotatedCustomerInformation(null);
        return view('admin.customer.quotation.customer_quotation_add', compact('packages', 'users', 'quotaions'));
    }

    public function customerQuotationFormSubmit(Request $request)
    {

        //
        $this->validate($request, [
            'quotationCustomerName' => 'required',
            'quoatationMobileNo' => 'required'
        ], [
            'customerName.required' => 'Please enter Customer Name!',
            'quoatationMobileNo.required' => 'Please enter Customer Mobile No!',

        ]);
        $name = $request->quotationCustomerName;
        $packageId = $request->packageId;
        $inspectionById = $request->inspectionById;
        $mobileNo = $request->quoatationMobileNo;
        $assignBy = Auth::user()->id;
        $remarks = $request->remarks;
        $date =  Carbon::now();
        $result = (new CustomerInfoService())->insertNewQuotationOfferToCustomer($name, $mobileNo, $assignBy, $inspectionById, $date, $packageId, $remarks);
        // dd($result);
        $notification = array(
            'messege' => 'Customer Quotation Save Success!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function customerQuotationEdit($id)
    {
        // dd($id);
        $quotation = (new CustomerInfoService())->getQuotatedCustomerInformation($id);
        $packages = (new CompanyInfoService())->getPackageInformation(null);
        // dd($quotation);

        $allCatg = (new DeviceInfoService())->getDeviceCategoryAll();
        $brands = (new DeviceInfoService())->getDeviceBrandAll(null);
        return view('admin.customer.quotation.customer_quotation_edit', compact('packages', 'quotation', 'allCatg', 'brands'));
    }

    public function customerQuotationUpdateFormSubmit(Request $request)
    {
        //  dd($request->all());
        $carts = Cart::content();

        $cusQuotationId = $request->cusQuotationId;
        $name = $request->quotationCustomerName;
        $packageId = $request->packageId;
        //$inspectionById = $request->inspectionById;
        $mobileNo = $request->quoatationMobileNo;
        $NetAmount = $request->NetAmount;
        $Discount = $request->Discount;
        $PayAmount = $request->PayAmount;
        $remarks = $request->remarks;
        // $remarks = $request->remarks;
        // $remarks = $request->remarks;
        $inspectionDate =  Carbon::now();

        (new DeviceInfoService())->addCustomerQuotationDeviceRecords($carts, $cusQuotationId);
        $isUdpated = (new CustomerInfoService())->updateCustomerQuotationByInspector($cusQuotationId, $name, $mobileNo, $packageId, $remarks, $NetAmount, $Discount, $PayAmount, $inspectionDate);
        Cart::destroy();
        // dd($isUdpated);

        if ($isUdpated) {
            Session::flash('success', 'value');
            return redirect()->back();
        }
        /*
  "" => "300"
  "Discount" => "0"
  "PayAmount" => "300"
  "quotationCustomerName" => "Rashed"
  "quoatationMobileNo" => "0123456789"
  "packageId" => "6"
  "remarks" => null

  "cusQuotationId" => 1
    "cutomerName" => "Rashed"
    "mobileNo" => "0123456789"
    "assignById" => 1
    "assignToId" => 1
    "assignToSubId" => 1
    "assignDate" => "2022-07-01"
    "inspectionDate" => "2022-07-01"
    "connnectionCost" => 0
    "paidAmount" => 0
    "packageId" => 6
    "approveStatus" => 1
    "status" => 1
    "remarks" => null
    "inspectorComments" => null
    "created_at" => "2022-07-01 02:06:44"
    "updated_at" => null
        */
    }
}
