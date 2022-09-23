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

class ComplainInfoController extends Controller
{
    //
    public function customerNewComplainForm()
    {

        $months = (new CompanyInfoService)->getMonths(null);
        $users = (new CompanyInfoService())->getUserInformation(null);
        $payments = (new CustomerPaymentInfoService())->getPaymentInformation(null);
        return view('admin.customer_complain.complain_add', compact('payments', 'users', 'months'));
    }
}
