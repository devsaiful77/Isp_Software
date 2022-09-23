<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\ConnectionInfo;
use App\Models\CustomerQuotation;
use Carbon\Carbon;
use Session;
use DB;

class CustomerInfoService extends Controller
{

    public function getTotalNumberOfCustomer()
    {
        return (customer::get()->count());
    }

    public function createCustomerID()
    {
        return $this->getTotalNumberOfCustomer() + 1001;
    }

    public function deleteCustomerConnectionInformation($id)
    {
        return $delete = ConnectionInfo::where('connectionId', $id)->delete();
    }

    // Customer
    public function insertCustomerInformation($customerID, $customerName, $fatherName, $email, $applicationDate, $phoneNo1, $phoneNo2, $connectionDate, $type_of_connection_id, $type_of_connectivity_id, $connectionStatusId, $customerOccupationId, $serviceTypeId, $packageId, $divisionId, $districtId, $upazilaId, $unionId, $serviceAreaId, $serviceSubAreaId, $pop_id, $description, $postCode, $roadNo, $houseNo, $floorNo, $plateNo, $nid)
    {
        return Customer::insertGetId([
            'customerID' => $customerID == null ? '1001' : $customerID,
            'customerName' => $customerName,
            'fatherName' => $fatherName,
            'email' => $email,
            'applicationDate' => $applicationDate,
            'phoneNo1' => $phoneNo1,
            'phoneNo2' => $phoneNo2,
            'connectionDate' => $connectionDate,
            'type_of_connection_id' => $type_of_connection_id,
            'type_of_connectivity_id' => $type_of_connectivity_id,
            'connectionStatusId' => $connectionStatusId,
            'customerOccupationId' => $customerOccupationId,
            'serviceTypeId' => $serviceTypeId,
            'packageId' => $packageId,
            'divisionId' => $divisionId,
            'districtId' => $districtId,
            'upazilaId' => $upazilaId,
            'unionId' => $unionId,
            'serviceAreaId' => $serviceAreaId,
            'serviceSubAreaId' => $serviceSubAreaId,
            'pop_id' => $pop_id,
            'description' => $description,
            'postCode' => $postCode,
            'roadNo' => $roadNo,
            'houseNo' => $houseNo,
            'floorNo' => $floorNo,
            'plateNo' => $plateNo,
            'nid' => $nid,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function getCustomerInformation($id)
    {
        if ($id == null) {
            return  $customers = Customer::all();
        } else {
            return  $customers = Customer::where('customerAutoId', $id)->first();
        }
    }

    public function updateCustomerInformation($id, $customerID, $customerName, $fatherName, $email, $applicationDate, $phoneNo1, $phoneNo2, $connectionDate, $type_of_connection_id, $type_of_connectivity_id, $connectionStatusId, $customerOccupationId, $serviceTypeId, $packageId, $divisionId, $districtId, $upazilaId, $unionId, $serviceAreaId, $serviceSubAreaId, $pop_id, $description, $postCode, $roadNo, $houseNo, $floorNo, $plateNo, $nid)
    {
        return $update = Customer::where('customerAutoId', $id)->update([
            'customerID' => $customerID == null ? '1001' : $customerID,
            'customerName' => $customerName,
            'fatherName' => $fatherName,
            'email' => $email,
            'applicationDate' => $applicationDate,
            'phoneNo1' => $phoneNo1,
            'phoneNo2' => $phoneNo2,
            'connectionDate' => $connectionDate,
            'type_of_connection_id' => $type_of_connection_id,
            'type_of_connectivity_id' => $type_of_connectivity_id,
            'connectionStatusId' => $connectionStatusId,
            'customerOccupationId' => $customerOccupationId,
            'serviceTypeId' => $serviceTypeId,
            'packageId' => $packageId,
            'divisionId' => $divisionId,
            'districtId' => $districtId,
            'upazilaId' => $upazilaId,
            'unionId' => $unionId,
            'serviceAreaId' => $serviceAreaId,
            'serviceSubAreaId' => $serviceSubAreaId,
            'pop_id' => $pop_id,
            'description' => $description,
            'postCode' => $postCode,
            'roadNo' => $roadNo,
            'houseNo' => $houseNo,
            'floorNo' => $floorNo,
            'plateNo' => $plateNo,
            'nid' => $nid,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function deleteCustomerInformation($id)
    {
        return $delete = Customer::where('customerAutoId', $id)->delete();
    }

    // Search Customer Name, Id, Phone
    public function searchCustomerInformation($searchingValue, $searchingValeType)
    {
        if ($searchingValeType == 'phone_no') {
            return  Customer::where('phoneNo1', 'LIKE', "%{$searchingValue}%")
                ->leftjoin('service_types', 'customers.serviceTypeId', '=', 'service_types.serviceTypeId')
                ->leftjoin('package_infos', 'customers.packageId', '=', 'package_infos.packageId')
                ->leftjoin('connection_statuses', 'customers.connectionStatusId', '=', 'connection_statuses.connectionStatusId')
                ->get();
        } else if ($searchingValeType == 'customer_name') {
            // return   Customer::where('customerName', 'LIKE', "%{$searchingValue}%")->get();

            return Customer::where('customerName', 'LIKE', "%{$searchingValue}%")
                ->leftjoin('service_types', 'customers.serviceTypeId', '=', 'service_types.serviceTypeId')
                ->leftjoin('package_infos', 'customers.packageId', '=', 'package_infos.packageId')
                ->leftjoin('connection_statuses', 'customers.connectionStatusId', '=', 'connection_statuses.connectionStatusId')
                ->get();
        } else if ($searchingValeType == 'id') {
            return  Customer::where('customerID', $searchingValue)
                ->leftjoin('service_types', 'customers.serviceTypeId', '=', 'service_types.serviceTypeId')
                ->leftjoin('package_infos', 'customers.packageId', '=', 'package_infos.packageId')
                ->leftjoin('connection_statuses', 'customers.connectionStatusId', '=', 'connection_statuses.connectionStatusId')
                ->get();
        } else if ($searchingValeType == 'nid') {
            return  Customer::where('nid', $searchingValue)
                ->leftjoin('service_types', 'customers.serviceTypeId', '=', 'service_types.serviceTypeId')
                ->leftjoin('package_infos', 'customers.packageId', '=', 'package_infos.packageId')
                ->leftjoin('connection_statuses', 'customers.connectionStatusId', '=', 'connection_statuses.connectionStatusId')
                ->get();
        } else {
            Customer::where('customerAutoId', $searchingValue)->get();
        }
    }

    public function customerConnectionStatusUpdate($customerAutoId, $connectionStatusId)
    {
        return Customer::where('customerAutoId', $customerAutoId)->update([
            'connectionStatusId' => $connectionStatusId,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
    }



    // Customer Connect Desconnect Update







    //Report
    public function getCustomerList($connection_statusId, $packageId)
    {
        // dd($statusId);
        if ($connection_statusId > 0 && $packageId > 0) {

            //dd($connection_statusId, $packageId);
            return Customer::where('customers.connectionStatusId', $connection_statusId)->where('customers.packageId', $packageId)
                ->join('service_types', 'customers.serviceTypeId', '=', 'service_types.serviceTypeId')
                ->leftjoin('package_infos', 'customers.packageId', '=', 'package_infos.packageId')
                ->leftjoin('connection_statuses', 'customers.connectionStatusId', '=', 'connection_statuses.connectionStatusId')
                ->get();
        } else if ($connection_statusId > 0) {
            return Customer::where('customers.connectionStatusId', $connection_statusId)
                ->join('service_types', 'customers.serviceTypeId', '=', 'service_types.serviceTypeId')
                ->leftjoin('package_infos', 'package_infos.packageId', '=', 'customers.packageId')
                ->leftjoin('connection_statuses', 'customers.connectionStatusId', '=', 'connection_statuses.connectionStatusId')
                ->get();
        } else if ($packageId > 0) {
            return Customer::where('customers.packageId', $packageId)
                ->join('service_types', 'customers.serviceTypeId', '=', 'service_types.serviceTypeId')
                ->leftjoin('package_infos', 'package_infos.packageId', '=', 'customers.packageId')
                ->leftjoin('connection_statuses', 'customers.connectionStatusId', '=', 'connection_statuses.connectionStatusId')
                ->get();
        } else {
            return Customer::join('service_types', 'customers.serviceTypeId', '=', 'service_types.serviceTypeId')
                ->join('package_infos', 'package_infos.packageId', '=', 'customers.packageId')
                ->leftjoin('connection_statuses', 'customers.connectionStatusId', '=', 'connection_statuses.connectionStatusId')
                ->get();
        }
    }

    public function getCustomerListByPackageId($packageId)
    {
        // dd($statusId);
        return Customer::where('packageId', $packageId)
            ->join('service_types', 'service_types.serviceTypeId', '=', 'customers.serviceTypeId')
            ->get();
    }

    public function getNewCustomer($fromdate, $toDate)
    {
        // $myDate = '01/07/2020';
        // $date = Carbon::createFromFormat('m/d/Y', $myDate);

        // $monthName = $date->format('F');

        // echo($monthName);
        // var_dump($monthName);

        $now = date('Y-m-d');
        return $reservations = Customer::where('created_at', '>=', $fromdate)
            ->where('created_at', '<=', $toDate)
            ->get();


        // $month= Carbon::now()->format('Y-m-d');
        // return Customer::where('created_at','>=',$month)->get();
    }


    /*
    CUSTOMER QUOTATION
    */

    public function insertNewQuotationOfferToCustomer($customerName, $mobileNo, $assignById, $assignToId, $applicationDate, $packageId, $remarks)
    {
        return CustomerQuotation::insertGetId([
            'cutomerName' => $customerName,
            'mobileNo' => $mobileNo,
            'assignById' => $assignById,
            'assignToId' => $assignToId,
            'assignToSubId' => $assignToId,
            'assignDate' => $applicationDate,
            'inspectionDate' => $applicationDate,
            'connnectionCost' => 0,
            'paidAmount' => 0,
            'packageId' => $packageId,
            'remarks' => $remarks,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
    }



    /*
 $table->string('cutomerName');
            $table->string('mobileNo');
            $table->integer('assignById');
            $table->integer('assignToId');
            $table->integer('assignToSubId');
            $table->date('assignDate');
            $table->date('inspectionDate');
            $table->integer('connnectionCost');
            $table->integer('paidAmount');
            $table->integer('packageId');
            $table->boolean('approveStatus')->default(1);
            $table->boolean('status')->default(1);
            $table->string('remarks')->nullable();
            $table->string('inspectorComments')->nullable();
    */
    public function getQuotatedCustomerInformation($id)
    {
        if ($id == null) {
            return  $customers = CustomerQuotation::where('delete_status','!=','suspend')->get();
        } else {
            return  $customers = CustomerQuotation::where('delete_status','!=','suspend')->where('cusQuotationId', $id)->first();
        }
    }


    public function updateCustomerQuotationByInspector($cusQuotationId, $customerName, $mobileNo, $packageId, $remarks,  $netAmount, $discount, $payAmount, $inspDate)
    {
        return CustomerQuotation::where('cusQuotationId', $cusQuotationId)->update([
            'cutomerName' => $customerName,
            'mobileNo' => $mobileNo,
            'paidAmount' => $payAmount,
            'inspectionDate' => $inspDate,
            'connnectionCost' => $netAmount - $discount,
            'paidAmount' => 0,
            'packageId' => $packageId,
            'approveStatus' => 2, // inpection completed
            'inspectorComments' => $remarks,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function approveQuotationOfferToCustomer($connnectionCost, $paidAmount, $cusQuotationId, $assignBy,$status){

        return CustomerQuotation::where('cusQuotationId', $cusQuotationId)->update([
            'paidAmount' => $paidAmount,
            'connnectionCost' => $connnectionCost,
            'status' => $status,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

    }


}
