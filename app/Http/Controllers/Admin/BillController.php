<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use App\Http\Controllers\Service\CustomerInfoService;
use App\Http\Controllers\Service\AccountsService;
use App\Http\Controllers\Service\CustomerPaymentInfoService;
use App\Models\Month;
use App\Models\PaymentInfo;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Validator;
use Auth;
use Carbon\Carbon;

class BillController extends Controller
{

    public function addNewPaymentForm()
    {
        $months = (new CompanyInfoService())->getMonths(null);
        $users = (new CompanyInfoService())->getUserInformation(null);
        $payments = (new CustomerPaymentInfoService())->getPaymentInformation(null);
        return view('admin.payment-info.payment_info_add', compact('payments', 'users', 'months'));
    }

    public function editPaymentInfoForm($id)
    {
        $months = (new CompanyInfoService())->getMonths(null);
        $users = (new CompanyInfoService())->getUserInformation(null);
        $payment = (new CustomerPaymentInfoService())->getPaymentInformation($id);
        return view('admin.payment-info.payment_info_edit', compact('payment', 'users', 'months'));
    }



    public function sendCustomerPaymentSMS($phone, $monthId)
    {
        $monthName = (Month::where('month_id', $monthId)->first());
        $msgbody = 'আপনার' . $monthName->bengla_name . 'মাসের ইন্টারনেট বিল পরিশোধের জন্য ধন্যবাদ,নেটপে থ্রিআই ইঞ্জিনিয়ারস';
        (new CustomerPaymentInfoService())->sendSMS($phone, $msgbody);
    }

    public function insertPaymentInfoFormSubmit(Request $request)
    {


        $this->validate($request, [
            'customerId' => 'required',
            'amount' => 'required',
            'paymentTypeId' => 'required',
            'paymentDate' => 'required',
            'collectedById' => 'required',
            'payMonth' => 'required',
            'payYear' => 'required',
        ], [
            'customerId.required' => 'Please select customer Id!',
            'amount.required' => 'Please enter amount!',
            'paymentTypeId.required' => 'Please select payment method!',
            'paymentDate.required' => 'Please enter payment date!',
            'collectedById.required' => 'Please enter collected by name!',
            'payMonth.required' => 'Please enter pay month!',
            'payYear.required' => 'Please enter pay year!',
        ]);

        $creator = Auth::user()->id;

        $insertId = (new CustomerPaymentInfoService())->insertPaymentInformation(
            $request['customerId'],
            $request['amount'],
            $request['paymentTypeId'],
            $request['paymentDate'],
            $request['collectedById'],
            $request['payMonth'],
            $request['payYear'],
            $creator
        );

        $acustomer = (new CustomerInfoService())->getCustomerInformation($request['customerId']);
        if ($acustomer != null) {


            //  $this->sendCustomerPaymentSMS($acustomer->phoneNo1, $request['payMonth']);
        }

        $notification = array(
            'messege' => 'Payment Save Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('payment_new_form')->with($notification);
    }

    public function updatePaymentInfoFormSubmit(Request $request)
    {

        $creator = Auth::user()->id;

        (new CustomerPaymentInfoService())->updatePaymentInformation(
            $request->paymentId,
            $request['customerId'],
            $request['amount'],
            $request['paymentTypeId'],
            $request['paymentDate'],
            $request['collectedById'],
            $request['payMonth'],
            $request['payYear'],
            $creator,
        );

        $notification = array(
            'messege' => 'Payment Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('payment_new_form')->with($notification);
    }

    public function deletePaymentInfoFormSubmit(Request $request)
    {
        $id = $request['modal_id'];
        (new CustomerPaymentInfoService())->deletePaymentInformation($id);

        $notification = array(
            'messege' => 'Payment Delete Success!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


    // Bill Generate
    public function billGenerateForm()
    {
        $connectionStatus = (new CompanyInfoService())->getConnectionStatusInformation(null);
        $months = (new CompanyInfoService())->getMonths(null);
        return view('admin.bill-generate.bill_generate', compact('months', 'connectionStatus'));
    }

    public function customerBillGenerateFormSubmit(Request $request)
    {
        //  dd($request->all());
        (new CustomerPaymentInfoService())->generateBillForActiveCustomer($request->payMonth, $request->connectionStatusId);

        $notification = array(
            'messege' => 'Bill Processing Completed!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


    // Bill Search
    public function customerBillSearchForm(){
        $billSearch = (new CustomerPaymentInfoService())->billSearchInformation(0,0,0,0);

        $months = (new CompanyInfoService())->getMonths(null);
        $users = (new CompanyInfoService())->getUserInformation(null);

        //dd($users);
        $serviceSubAreas = (new CompanyInfoService())->getServiceSubAreaInformation(null);
        $popAddress = (new CompanyInfoService())->getPopAddressInformation(null);
        return view('admin.bill-search.bill_search',compact('popAddress','serviceSubAreas','users','months','billSearch'));
    }

    public function customerBillSearchFormSubmit(Request $request){
        //dd($request->all());

        $months = (new CompanyInfoService())->getMonths(null);
        $users = (new CompanyInfoService())->getUserInformation(null);

        //dd($users);
        $serviceSubAreas = (new CompanyInfoService())->getServiceSubAreaInformation(null);
        $popAddress = (new CompanyInfoService())->getPopAddressInformation(null);

        $billSearch = (new CustomerPaymentInfoService())->billSearchInformation($request->pop_id, $request->serviceSubAreaId, $request->seller_id, $request->month_id);
            
        //dd($billSearch);

        return view('admin.bill-search.bill_search',compact('billSearch','popAddress','serviceSubAreas','users','months'));
    }

    public function customerBillPayFormSubmit(Request $request){

    }


    // Report IIG Payment
    public function reportIigPaymentForm()
    {
        return view('admin.report.iig-payment.iig_payment_report_form');
    }

    //Report IIG Paymentt by date
    public function reportIigPaymentSearch(Request $request)
    {
        $companyRecords = (new CompanyInfoService())->getCompanyProfileInformation(null);

        $date = $request->date;
        $paymentRecords = (new CustomerPaymentInfoService())->iigPaymentRecordsByDateToDate($request->date, $request->date);

        return view('admin.report.iig-payment.iig_payment_report_by_date', compact('paymentRecords', 'date', 'companyRecords'));
    }




    // Report Day Closing
    public function loadDayClosingReportForm()
    {
        return view('admin.report.day-closing.day_closing_report_form');
    }

    public function dayClosingReportDetails(Request $request)
    {
        dd($request->all());

        $collectionRecords = (new CustomerPaymentInfoService())->getCustomerPaymentRecordsByDateToDate($request->fromDate, $request->toDate);
        $IIGPaymentRecords = (new CustomerPaymentInfoService())->getIIGPaymentRecordsByDateToDate($request->fromDate, $request->toDate);
        $dailyCostRecords = (new AccountsService())->getOtherCostRecordByDateToDay($request->fromDate, $request->toDate);
        //dd($collectionRecords, $IIGPaymentRecords, $dailyCostRecords);
        return view('admin.report.day-closing.day_closing_by_details');
    }

    public function loadDayClosingReportProcess(Request $request)
    {
        $fromDate = $request->fromDate;
        $toDate = $request->toDate;

        $totalCustomerBillAmount = (new CustomerPaymentInfoService())->getCustomerTotalPaidAmountByDateToDate($request->fromDate, $request->toDate);
        //dd($totalCustomerBillAmount);

        $totalIIGPayment = (new CustomerPaymentInfoService())->getIIGPaymentTotalAmountByDateToDate($request->fromDate, $request->toDate);

        $totalDailyCost = (new AccountsService())->getOthersCostTotalAmountByDateToDay($request->fromDate, $request->toDate);


        // dd($totalCustomerBillAmount, $totalIIGPayment, $totalDailyCost);

        return view('admin.report.day-closing.day_closing_report_by_date', compact('totalIIGPayment', 'totalDailyCost', 'totalCustomerBillAmount', 'fromDate', 'toDate'));
    }



    //  ===================================================================
    //  ======================= Payment API SECTION =======================
    //  ===================================================================





    public function saveCustomerPaymentInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customerId' => 'required',
            'amount' => 'required',
            'paymentTypeId' => 'required',
            'paymentDate' => 'required',
            'collectedById' => 'required',
            // 'transactionNo' => 'required',
            'payMonth' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'status_code' => '401', 'error' => 'error', 'message' => $validator->errors()]);
        }

        try {

            $creator = Auth::user()->id;

            $insertId = (new CustomerPaymentInfoService())->insertPaymentInformation(
                $request['customerId'],
                $request['amount'],
                $request['paymentTypeId'],
                $request['paymentDate'],
                $request['collectedById'],
                $request['payMonth'],
                $request['payYear'],
                $creator,
            );

            $acustomer = (new CustomerInfoService())->getCustomerInformation($request['customerId']);
            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $insertId]);
        } catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'message' => $ex->getMessage(), 'error' => 'error']);
        }
    }


    public function getCustomerPaymentDetails($id = null)
    {

        try {
            if ($id == null) {
                $apackage = PaymentInfo::all();
            } else {
                $apackage = PaymentInfo::where('paymentId', $id)->get();
            }

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $apackage]);
        } catch (ModelNotFoundException $ex) {
            return response()->json([
                'success' => 'false', 'status_code' => '404',
                'error' => 'Invalid:Model Not Found'
            ]);
        } catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'error' => $ex->getMessage()]);
        }
    }
}
