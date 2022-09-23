<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use App\Http\Controllers\Service\AccountsService;
use Illuminate\Http\Request;
use Auth;

class DrVoucherController extends Controller
{

    public function addNewDrVoucherForm()
    {

        $months = (new CompanyInfoService())->getMonths(null);
        $users = (new CompanyInfoService())->getUserInformation(null);
        $drTypes = (new CompanyInfoService())->getDrTypeInformation(null);
        $drVouchers = (new CompanyInfoService())->getDrVoucherInformation(null);
        return view('admin.dr-voucher.dr_voucher_add', compact('drVouchers', 'users', 'drTypes', 'months'));
    }

    public function editDrVoucherInfoForm($id)
    {
        $months = (new CompanyInfoService())->getMonths(null);
        $users = (new CompanyInfoService())->getUserInformation(null);
        $drTypes = (new CompanyInfoService())->getDrTypeInformation(null);
        $drVoucher = (new CompanyInfoService())->getDrVoucherInformation($id);
        return view('admin.dr-voucher.dr_voucher_edit', compact('drVoucher', 'drTypes', 'users', 'months'));
    }



    public function insertDrVoucherInfoFormSubmit(Request $request)
    {

        $this->validate($request, [
            'amount' => 'required',
        ], [
            'amount.required' => 'Please enter amount!',
        ]);

        $creator = Auth::user()->id;

        (new CompanyInfoService())->insertDrVoucherInformation(
            $request['transactionId'],
            $request['drTypeId'],
            $request['expenseDate'],
            $request['amount'],
            $request['debitedTold'],
            $request['creditedFromId'],
            $request['expenseById'],
            $request['approve_Status'],
            $request['year'],
            $request['monthId'],
            $request['voucherNo'],
            $creator,
        );

        $notification = array(
            'messege' => 'DrVoucId Save Success!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function updateDrVoucherInfoFormSubmit(Request $request)
    {

        // dd($request->all());

        $creator = Auth::user()->id;

        (new CompanyInfoService())->updateDrVoucherInformation(
            $request->drVoucId,
            $request['transactionId'],
            $request['drTypeId'],
            $request['expenseDate'],
            $request['amount'],
            $request['debitedTold'],
            $request['creditedFromId'],
            $request['expenseById'],
            $request['approve_Status'],
            $request['year'],
            $request['monthId'],
            $request['voucherNo'],
            $creator,
        );

        $notification = array(
            'messege' => 'DrVoucher Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('dr_voucher_new_form')->with($notification);
    }

    public function deleteDrVoucherInfoFormSubmit(Request $request)
    {
        $id = $request['modal_id'];
        (new CompanyInfoService())->deleteDrVoucherInformation($id);

        $notification = array(
            'messege' => 'DrVoucher Delete Success!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    // Report
    public function reportDailyCostForm()
    {
        return view('admin.report.daily-cost.daily_cost_report_form');
    }

    //report payment by date
    public function reportDailyCostSearch(Request $request)
    {
        $companyRecords = (new CompanyInfoService())->getCompanyProfileInformation(null);

        $date = $request->date;
        $dailyCostRecords = (new AccountsService())->getOtherCostRecordByDateToDay($request->date, $request->date);

        return view('admin.report.daily-cost.daily_cost_report', compact('dailyCostRecords', 'date', 'companyRecords'));
    }
}
