<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentInfo;
use App\Models\BillInfo;
use App\Models\User;
use App\Models\Month;
use App\Models\Customer;
use App\Models\ProductPurchase;
use Carbon\Carbon;
use DateTime;
use Session;
use Auth;

class CustomerPaymentInfoService extends Controller
{
    public function sendSMS($phone, $msgbody)
    {
        //  sms-service/send-demo-ciss-sms
        $companyId = 3;
        // $phone = '01731540704';
        $smsType = 'unicode';
        // $msgbody = 'হাই রাশেদ';
        // $url = "http://smsgateway-service.3iengineers.com/api/sms-service/sms-service/send-demo-ciss-sms?" . "companyId=" . $companyId . "&phone=" . $phone . "&smsType=" . $smsType . "&msgBody=" . $msgbody;

        $url = "http://bulksms.smsbuzzbd.com/smsapi";

        $apikey = 'starhair607fe476853fa7.85800013';
        $senderId = '8809612446121';
        $data = [
            "api_key" => $apikey,
            "type" => $smsType,
            "contacts" => $phone,
            "senderid" => $senderId,
            "msg" => $msgbody,
        ];
        //  dd('dsfdf llll');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;
    }

    public function insertPaymentInformation($customerId, $amount, $paymentTypeId, $paymentDate, $collectedById, $payMonth, $payYear, $creator)
    {
        return $insert = PaymentInfo::insertGetId([
            'customerId' => $customerId,
            'amount' => $amount,
            'paymentTypeId' => $paymentTypeId,
            'paymentDate' => $paymentDate,
            'collectedById' => $collectedById,
            'payMonth' => $payMonth,
            'payYear' => $payYear,
            'creator' => $creator,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function getPaymentInformation($id)
    {
        if ($id == null) {
            return  $paymentInfo = PaymentInfo::all();
        } else {
            return  $paymentInfo = PaymentInfo::where('paymentId', $id)->first();
        }
    }

    public function updatePaymentInformation($id, $customerId, $amount, $paymentTypeId, $paymentDate, $collectedById, $payMonth, $payYear, $creator)
    {
        return $update = PaymentInfo::where('paymentId', $id)->update([
            'customerId' => $customerId,
            'amount' => $amount,
            'paymentTypeId' => $paymentTypeId,
            'paymentDate' => $paymentDate,
            'collectedById' => $collectedById,
            'payMonth' => $payMonth,
            'payYear' => $payYear,
            'creator' => $creator,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function deletePaymentInformation($id)
    {
        return PaymentInfo::where('paymentId', $id)->delete();
    }




    // ======== Bill Generate ==========

    public function generateBillForActiveCustomer($monthId, $connectionStatusId){
        $list = (new CustomerInfoService())->getCustomerList($connectionStatusId, 0);
        //dd($list);
        $billId = -1;

        $creator = Auth::user()->id;

        foreach ($list as $alist) {
           //dd($alist);
            $billinfo = BillInfo::where('month_id',$monthId)->where('year', Carbon::now()->year)->where('customerAutoId',$alist->customerAutoId)->first();

            if($billinfo != null){
               // dd($billinfo);

                BillInfo::where('billAutoId', $billinfo->billAutoId)->update([
                    'bill_amount' => $alist->price,
                    'packageId' => $alist->packageId,
                    'date' => Carbon::today(),
                    'creator' => $creator,
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ]);
            }else{
                        //   dd($alist);

                BillInfo::insertGetId([
                    'customerAutoId' => $alist->customerAutoId,
                    'bill_amount' => $alist->price,
                    'packageId' => $alist->packageId,
                    'date' => Carbon::today(),
                    'month_id' => $monthId,
                    'year' => Carbon::now()->year,
                    'creator' => $creator,
                    'created_at' => Carbon::now()->toDateTimeString(),
                ]);
            }

           
        }
        return true;
    }



    // ======== Bill Search ==========

    public function billSearchInformation($pop_id, $serviceSubAreaId, $seller_id, $month_id){

        // dd($month_id);

        //where('pop_id', $pop_id)->where('serviceSubAreaId', $serviceSubAreaId)->where('bill_infos.month_id', $month_id)

        return BillInfo::where('customers.pop_id', $pop_id)->where('serviceSubAreaId', $serviceSubAreaId)->where('collectedById', $seller_id)->where('bill_infos.month_id', $month_id)
        ->join('customers', 'customers.customerAutoId', '=', 'bill_infos.customerAutoId')
        ->join('months', 'months.month_id', '=', 'bill_infos.month_id')
        ->join('payment_infos', 'payment_infos.customerId', '=', 'bill_infos.customerAutoId')
        ->join('users', 'users.id', '=', 'payment_infos.collectedById')
        ->get();
    }

    public function customerBillPayInformation(){

    }


    // ======== Report Collection ==========

    //Report Payment by date
    public function customerPaymentRecordsByDate($date)
    {
        $formateDate = new DateTime($date);
        return PaymentInfo::where('paymentDate', $formateDate)
            ->join('customers', 'customers.customerAutoId', '=', 'payment_infos.customerId')
            ->join('months', 'months.month_id', '=', 'payment_infos.payMonth')
            ->join('users', 'users.id', '=', 'payment_infos.collectedById')
            ->get();
    }
    public function getCustomerPaymentRecordsByDateToDate($fromDate, $toDate)
    {
        //$formateDate = new DateTime($date);

        return PaymentInfo::whereBetween('paymentDate', [$fromDate, $toDate]) //->where('paymentDate', $toDate)
            ->join('customers', 'customers.customerAutoId', '=', 'payment_infos.customerId')
            ->join('months', 'months.month_id', '=', 'payment_infos.payMonth')
            ->join('users', 'users.id', '=', 'payment_infos.collectedById')
            ->get();
    }

    public function getCustomerTotalPaidAmountByDateToDate($fromDate, $toDate)
    {
        //$formateDate = new DateTime($date);

        return PaymentInfo::whereBetween('paymentDate', [$fromDate, $toDate]) //->where('paymentDate', $toDate)
            // ->join('customers', 'customers.customerAutoId', '=', 'payment_infos.customerId')
            // ->join('months', 'months.month_id', '=', 'payment_infos.payMonth')
            //  ->join('users', 'users.id', '=', 'payment_infos.collectedById')
            ->sum('amount');
    }

    //Report Payment by Year Month
    public function customerPaymentRecordsByMonthYear($payYear, $payMonth)
    {

        return PaymentInfo::where('payMonth', $payMonth)->where('payYear', $payYear)
            ->join('customers', 'customers.customerAutoId', '=', 'payment_infos.customerId')
            ->join('months', 'months.month_id', '=', 'payment_infos.payMonth')
            ->join('users', 'users.id', '=', 'payment_infos.collectedById')
            ->get();
    }

    //Report Payment by year
    public function customerPaymentRecordsByYear($payYear)
    {
        // $year= Carbon::now()->format('Y');

        return PaymentInfo::where('payYear', $payYear)
            ->join('customers', 'customers.customerAutoId', '=', 'payment_infos.customerId')
            ->join('months', 'months.month_id', '=', 'payment_infos.payMonth')
            ->join('users', 'users.id', '=', 'payment_infos.collectedById')
            ->get();
    }


    // ======== Report IIG Payment ==========
    public function getIIGPaymentRecordsByDateToDate($fromDate, $toDate)
    {
        $formateDate = new DateTime($fromDate);
        return PaymentInfo::whereBetween('paymentDate', [$formateDate, $toDate])
            ->join('customers', 'customers.customerAutoId', '=', 'payment_infos.customerId')
            ->join('months', 'months.month_id', '=', 'payment_infos.payMonth')
            ->join('users', 'users.id', '=', 'payment_infos.collectedById')
            ->get();
    }

    public function getIIGPaymentTotalAmountByDateToDate($fromDate, $toDate)
    {
        $formateDate = new DateTime($fromDate);
        $toDate = new DateTime($toDate);
        return ProductPurchase::whereBetween('created_at', [$formateDate, $toDate])
            // ->join('customers', 'customers.customerAutoId', '=', 'payment_infos.customerId')
            // ->join('months', 'months.month_id', '=', 'product_purchases.month_id')
            // ->join('users', 'users.id', '=', 'payment_infos.collectedById')
            ->sum('paid_amount');
    }

    public function getAllOthersIncome()
    {
    }
}
