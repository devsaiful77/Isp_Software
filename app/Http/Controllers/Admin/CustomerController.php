<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CustomerInfoService;
use App\Http\Controllers\Service\CompanyInfoService;
use App\Http\Controllers\Helpers\FileUploadController;
use App\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Validator;
use Exception;

use App\Exports\CustomerExport;
use Excel;

class CustomerController extends Controller
{

    public function addNewCustomerForm()
    {
        $popAddress = (new CompanyInfoService())->getPopAddressInformation(null);
        $connectionStatus = (new CompanyInfoService())->getConnectionStatusInformation(null);
        $numberOfCustomer = (new CustomerInfoService())->createCustomerID();
        $serviceSubAreas = (new CompanyInfoService())->getServiceSubAreaInformation(null);
        $serviceAreas = (new CompanyInfoService())->getServiceAreaInformation(null);
        $unions = (new CompanyInfoService())->getUnionInformation(null);
        $upazilas = (new CompanyInfoService())->getUpazilaInformation(null);
        $districts = (new CompanyInfoService())->getDistrictInformation(null);
        $divisions = (new CompanyInfoService())->getDivisionInformation(null);
        $packageInformations = (new CompanyInfoService())->getPackageInformation(null);
        $serviceTypes = (new CompanyInfoService())->getServiceTypeInformation(null);
        $customers = (new CustomerInfoService())->getCustomerInformation(null);

        return view('admin.customer.customer_add', compact('customers', 'serviceTypes', 'packageInformations', 'divisions', 'districts', 'upazilas', 'unions', 'serviceAreas', 'serviceSubAreas', 'numberOfCustomer', 'connectionStatus', 'popAddress'));
    }


    public function editCustomerInfoForm($id)
    {
        $popAddress = (new CompanyInfoService())->getPopAddressInformation(null);
        $connectionStatus = (new CompanyInfoService())->getConnectionStatusInformation(null);
        $numberOfCustomer = (new CustomerInfoService())->createCustomerID();
        $serviceSubAreas = (new CompanyInfoService())->getServiceSubAreaInformation(null);
        $serviceAreas = (new CompanyInfoService())->getServiceAreaInformation(null);
        $unions = (new CompanyInfoService())->getUnionInformation(null);
        $upazilas = (new CompanyInfoService())->getUpazilaInformation(null);
        $districts = (new CompanyInfoService())->getDistrictInformation(null);
        $divisions = (new CompanyInfoService())->getDivisionInformation(null);
        $packageInformations = (new CompanyInfoService())->getPackageInformation(null);
        $serviceTypes = (new CompanyInfoService())->getServiceTypeInformation(null);
        $customers = (new CustomerInfoService())->getCustomerInformation(null);
        $customer = (new CustomerInfoService())->getCustomerInformation($id);

        return view('admin.customer.customer_edit', compact('customer', 'customers', 'serviceTypes', 'packageInformations', 'divisions', 'districts', 'upazilas', 'unions', 'serviceAreas', 'serviceSubAreas', 'numberOfCustomer', 'connectionStatus', 'popAddress'));
    }

    public function insertCustomerInfoFormSubmit(Request $request)
    {
        //dd($request->all());

        $this->validate($request, [
            'customerName' => 'required',
        ], [
            'customerName.required' => 'Please enter Customer Name!',
        ]);

        (new CustomerInfoService())
            ->insertCustomerInformation(
                $request['customerID'],
                $request['customerName'],
                $request['fatherName'],
                $request['email'],
                $request['applicationDate'],
                $request['phoneNo1'],
                $request['phoneNo2'],
                $request['connectionDate'],
                $request['type_of_connection_id'],
                $request['type_of_connectivity_id'],
                $request['connectionStatusId'],
                $request['customerOccupationId'],
                $request['serviceTypeId'],
                $request['packageId'],
                $request['divisionId'],
                $request['districtId'],
                $request['upazilaId'],
                $request['unionId'],
                $request['serviceAreaId'],
                $request['serviceSubAreaId'],
                $request['pop_id'],
                $request['description'],
                $request['postCode'],
                $request['roadNo'],
                $request['houseNo'],
                $request['floorNo'],
                $request['plateNo'],
                $request['nid'],
            );

        $notification = array(
            'messege' => 'Customer Save Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('customer.quotation.initial.add')->with($notification);
    }

    public function updateCustomerInfoFormSubmit(Request $request)
    {

        // dd($request->all());
        (new CustomerInfoService())->updateCustomerInformation(
            $request->customerAutoId,
            $request['customerID'],
            $request['customerName'],
            $request['fatherName'],
            $request['email'],
            $request['applicationDate'],
            $request['phoneNo1'],
            $request['phoneNo2'],
            $request['connectionDate'],
            $request['type_of_connection_id'],
            $request['type_of_connectivity_id'],
            $request['connectionStatusId'],
            $request['customerOccupationId'],
            $request['serviceTypeId'],
            $request['packageId'],
            $request['divisionId'],
            $request['districtId'],
            $request['upazilaId'],
            $request['unionId'],
            $request['serviceAreaId'],
            $request['serviceSubAreaId'],
            $request['pop_id'],
            $request['description'],
            $request['postCode'],
            $request['roadNo'],
            $request['houseNo'],
            $request['floorNo'],
            $request['plateNo'],
            $request['nid'],
        );



        $notification = array(
            'messege' => 'Customer Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('customer_new_form')->with($notification);
    }

    public function deleteCustomerInfoFormSubmit(Request $request)
    {
        $id = $request['modal_id'];
        (new CustomerInfoService())->deleteCustomerInformation($id);

        $notification = array(
            'messege' => 'Customer Delete Success!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function searchCustomerInformation(Request $request)
    {
        $customer = (new CustomerInfoService())->searchCustomerInformation($request->value, $request->value_type);
        if ($customer) {
            return  response()->json(['data' => $customer, 'success' => 'true', 'status_code' => 200]);
        } else {
            return response()->json(['success' => 'false', 'status_code' => '401', 'error' => 'error', 'message' => $validator->errors()]);
        }
    }



    // Customer Connect Desconnect Form Show
    public function customerConnectDesconnectForm()
    {
        $connectionStatus = (new CompanyInfoService())->getConnectionStatusInformation(null);
        return view('admin.customer.customer_connect_desconnect', compact('connectionStatus'));
    }

    public function updateCustomerConnectDesconnectFormSubmit(Request $request)
    {

        //dd($request->all());
        Customer::where('customerAutoId',  $request->customerAutoId)->update([
            'connectionStatusId' => $request->connectionStatusId ?? 6,
            // 'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        $notification = array(
            'messege' => 'Customer Connect Desconnect Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }




    // Report 

    public function reportCustomerForm()
    {
        $months = (new CompanyInfoService())->getMonths(null);
        $connectionStatus = (new CompanyInfoService())->getConnectionStatusInformation(null);
        $packageList = (new CompanyInfoService())->getPackageInformation(null);
        return view('admin.report.customer.customer_report_form', compact('connectionStatus', 'packageList', 'months'));
    }

    public function customerReportFormSubmit(Request $request)
    {
        // dd($request->connectionStatusId);

        $companyRecords = (new CompanyInfoService())->getCompanyProfileInformation();

        $con_statusId = (int) $request->connectionStatusId;

        $packageId = (int) $request->packageId;

        if ($con_statusId != 0 && $packageId != 0) {
            //dd($packageId);
            $reportTitle = ''; // (new CompanyInfoService())->getPackageInformation($packageId)->packageName;
            //  $reportTitle = 'Package Type :'.$reportTitle;
            // dd($packageId);
            $reportTitle = (new CompanyInfoService())->getConnectionStatusInformation($con_statusId)->connectionName;
            $reportTitle = 'Connection Status :' . $reportTitle . '@\n' . ' Package Type :' . $reportTitle;

            $customerList = (new CustomerInfoService())->getCustomerList($con_statusId, $packageId);
            return view('admin.report.customer.customer_report_list', compact('reportTitle', 'customerList', 'companyRecords'));
        } else if ($packageId != 0) {

            $reportTitle = (new CompanyInfoService())->getPackageInformation($packageId)->packageName;
            $reportTitle = 'Package Type :' . $reportTitle;

            $customerList = (new CustomerInfoService())->getCustomerList(0, $packageId);
            return view('admin.report.customer.customer_report_list', compact('reportTitle', 'customerList', 'companyRecords'));
        } else if ($con_statusId > 0) {
            $reportTitle = (new CompanyInfoService())->getConnectionStatusInformation($con_statusId)->connectionName;
            $reportTitle = 'Connection Status :' . $reportTitle;

            $customerList = (new CustomerInfoService())->getCustomerList($con_statusId, 0);
            return view('admin.report.customer.customer_report_list', compact('reportTitle', 'customerList', 'companyRecords'));
        } else {
            $reportTitle = 'Connection Status : All' . 'Package:All';

            $customerList = (new CustomerInfoService())->getCustomerList(0, 0);
            return view('admin.report.customer.customer_report_list', compact('reportTitle', 'customerList', 'companyRecords'));
        }
    }

    public function customerReportNewCustomerFormSubmit(Request $request)
    {
        // dd($request->all());
        $newCustomer = (new CustomerInfoService())->getNewCustomer(
            $request['fromdate'],
            $request['toDate'],
        );

        $months = (new CompanyInfoService())->getMonths(null);
        $companyRecords = (new CompanyInfoService())->getCompanyProfileInformation();
        return view('admin.report.customer.new_customer_report_list', compact('companyRecords', 'months', 'newCustomer'));
    }


    // Excel Customer

    public function customerExcel(Request $request)
    {
        $connection_statusId = $request['connection_statusId'];
        $packageId = $request['packageId'];
        return Excel::download(new CustomerExport($connection_statusId, $packageId), 'customerlist.xlsx');
    }

    //CSV Customer
    public function customerIntoCSV(Request $request)
    {
        $connection_statusId = $request['connection_statusId'];
        $packageId = $request['packageId'];
        return Excel::download(new CustomerExport($connection_statusId, $packageId), 'customerlist.csv');
    }















    //  ===================================================================
    //  ======================= Customer API SECTION ======================
    //  ===================================================================

    public function saveNewCustomerInformation(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'customerName' => 'required',
            'fatherName' => 'required',
            'email' => 'required',
            'applicationDate' => 'required',
            'phoneNo1' => 'required',
            // 'phoneNo2' => 'required',
            'connectionDate' => 'required',
            'connectionStatusId' => 'required',
            'customerOccupationId' => 'required',
            'serviceTypeId' => 'required',
            'packageId' => 'required',
            'divisionId' => 'required',
            'districtId' => 'required',
            'upazilaId' => 'required',
            'unionId' => 'required',
            'serviceAreaId' => 'required',
            'serviceSubAreaId' => 'required',
            'description' => 'required',
            'postCode' => 'required',
            'roadNo' => 'required',
            'houseNo' => 'required',
            'floorNo' => 'required',
            'plateNo' => 'required',
            'nid' => 'required'

        ]);

        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'status_code' => '401', 'error' => 'error', 'message' => $validator->errors()]);
        }

        try {
            // $uploadObj = new FileUploadController();
            // $proImgPath = $uploadObj->uploadEmployeeProfileImage($request);
            // $nidPath = $uploadObj->uploadEmployeeNIDImage($request);

            $customerID = $request['customerID'];
            $customerName =  $request->input('customerName');
            $fatherName =  $request->input('fatherName');
            $email =  $request->input('email');
            $applicationDate =  $request->input('applicationDate');
            $phoneNo1 =  $request->input('phoneNo1');
            $phoneNo2 =  $request->input('phoneNo2');
            $connectionDate =  $request->input('connectionDate');
            $connectionStatusId =  $request->input('connectionStatusId');
            $customerOccupationId =  $request->input('customerOccupationId');
            $serviceTypeId =  $request->input('serviceTypeId');
            $packageId =  $request->input('packageId');
            $divisionId =  $request->input('divisionId');
            $districtId =  $request->input('districtId');
            $upazilaId =  $request->input('upazilaId');
            $unionId =  $request->input('unionId');
            $serviceAreaId =  $request->input('serviceAreaId');
            $serviceSubAreaId =  $request->input('serviceSubAreaId');
            $description =  $request->input('description');
            $postCode =  $request->input('postCode');
            $roadNo =  $request->input('roadNo');
            $houseNo =  $request->input('houseNo');
            $floorNo =  $request->input('floorNo');
            $plateNo =  $request->input('plateNo');
            $nid =  $request->input('nid');
            $popAddressId = 1; // $request['pop_id'];
            $type_of_connection_id = 1;
            $type_of_connectivity_id = 1;
            // $anEmployee->Photo =  $proImgPath;
            // $anEmployee->NID = $nidPath;
            $customer = (new CustomerInfoService())->insertCustomerInformation($customerID, $customerName, $fatherName, $email, $applicationDate, $phoneNo1, $phoneNo2, $connectionDate, $type_of_connection_id, $type_of_connectivity_id, $connectionStatusId, $customerOccupationId, $serviceTypeId, $packageId, $divisionId, $districtId, $upazilaId, $unionId, $serviceAreaId, $serviceSubAreaId, $popAddressId, $description, $postCode, $roadNo, $houseNo, $floorNo, $plateNo, $nid);

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $customer]);
        } catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'message' => $ex->getMessage(), 'error' => 'error']);
        }
    }


    public function getCustomerInformation($id = null)
    {

        try {

            $customer = (new CustomerInfoService())->getCustomerInformation($id);
            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $customer]);
        } catch (ModelNotFoundException $ex) {
            return response()->json([
                'success' => 'false', 'status_code' => '404',
                'error' => 'Invalid:Model Not Found'
            ]);
        } catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'error' => $ex->getMessage()]);
        }
    }


    public function updateCustomerConnectStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customerAutoId' => 'required',
            'connectionStatusId' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'status_code' => '401', 'error' => 'error', 'message' => $validator->errors()]);
        }

        (new CustomerInfoService())->customerConnectionStatusUpdate($request->customerAutoId, $request->connectionStatusId);
    }
    public function getCustomerList(Request $request)
    {

        // dd($request->all());
        try {
            $customerList = (new CustomerInfoService())->getCustomerList($request->connection_statusId, $request->packageId);
            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $customerList]);
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
