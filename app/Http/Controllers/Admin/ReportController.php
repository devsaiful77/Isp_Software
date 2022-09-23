<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CustomerPaymentInfoService;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;
use App\Models\PaymentInfo;

class ReportController extends Controller
{

    public function reportPaymentForm()
    {

        $months = (new CompanyInfoService())->getMonths(null);
        return view('admin.report.payment.payment_report_form', compact('months'));
    }

    //report payment by date
    public function reportPaymentSearchByDate(Request $request)
    {
        $companyRecords = (new CompanyInfoService())->getCompanyProfileInformation(null);

        $date = $request->date;
        $paymentRecords = (new CustomerPaymentInfoService())->customerPaymentRecordsByDate($request->date);

        return view('admin.report.payment.payment_report_by_date', compact('paymentRecords', 'date', 'companyRecords'));
    }

    //report payment by month & year
    public function reportPaymentSearchByMonth(Request $request)
    {
        $companyRecords = (new CompanyInfoService())->getCompanyProfileInformation(null);

        $payYear = $request->payYear;
        $payMonth = $request->payMonth;
        
        $monthName = (new CompanyInfoService())->getMonthEnglishName($payMonth);

        $paymentRecords = (new CustomerPaymentInfoService())->customerPaymentRecordsByMonthYear($request->payYear, $request->payMonth);

        return view('admin.report.payment.payment_report_by_month_year', compact('paymentRecords', 'payMonth', 'payYear', 'companyRecords', 'monthName'));
    }

    //report Payment by year
    public function reportPaymentSearchByYear(Request $request)
    {
        $companyRecords = (new CompanyInfoService())->getCompanyProfileInformation(null);

        $payYear = $request->payYear;
        $paymentRecords = (new CustomerPaymentInfoService())->customerPaymentRecordsByYear($request->payYear);

        return view('admin.report.payment.payment_report_by_year', compact('paymentRecords', 'payYear', 'companyRecords'));
    }
}
