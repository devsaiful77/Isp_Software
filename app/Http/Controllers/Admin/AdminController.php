<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\PaymentInfo;
use Carbon\Carbon;


class AdminController extends Controller
{

    public function index()
    {

        //$runningMonth = (int) Date('m');
        //$unpaidCoustomers =  $this->countBillUnPaidCustomer($runningMonth);
        return view('admin.dashboard.home');
    }

    public function countBillUnPaidCustomer($monthId)
    {
        // return Customer::whereNotIn(
        //     'customerAutoId',
        //     (PaymentInfo::select('customerId')->where('payMonth', $monthId))
        // )->count();

        // dd($customerList);
    }
}
