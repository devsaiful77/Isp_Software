<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Service\CompanyInfoService;
use App\Http\Controllers\Service\CustomerInfoService;
use App\Models\ConnectionInfo;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Validator;
use Exception;


class ConnectionInfoController extends Controller
{
    public function addNewConnectionForm()
    {
        $customers = (new CustomerInfoService())->getCustomerList(1, 0);
        // dd($customers);
        $connections = (new CompanyInfoService())->getConnectionInformation(null);
        // dd($connections);
        return view('admin.connection.connection_add', compact('connections', 'customers'));
    }

    public function editConnectionInfoForm($id)
    {
        $connection = (new CompanyInfoService())->getConnectionInformation($id);
        return view('admin.connection.connection_edit', compact('connection'));
    }

    public function insertConnectionInfoFormSubmit(Request $request)
    {

        try {

            $connection = (new CompanyInfoService())
                ->insertConnectionInformation(
                    $request['customerAutoId'],
                    $request['ipAddress'],
                    $request['userId'],
                    $request['userPassword'],
                    $request['description'],
                );

            (new CustomerInfoService())->customerConnectionStatusUpdate($request->customerAutoId, 2);


            if ($connection) {
                $notification = array(
                    'messege' => 'Connection Save Success!',
                    'alert-type' => 'success',
                );
                return redirect()->route('connection_new_form')->with($notification);
            } else {
                $notification = array(
                    'messege' => 'Duplicate data!',
                    'alert-type' => 'error',
                );
                return redirect()->back()->with($notification);
            }
        } catch (Exception $ex) {
            $notification = array(
                'messege' => 'Please Try Again!',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function updateConnectionInfoFormSubmit(Request $request)
    {
        (new CompanyInfoService())->updateConnectionInformation(
            $request->connectionId,
            $request['customerAutoId'],
            $request['ipAddress'],
            $request['userId'],
            $request['userPassword'],
            $request['description'],
        );

        (new CustomerInfoService())->customerConnectionStatusUpdate($request->customerAutoId, 2);

        $notification = array(
            'messege' => 'Connection Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('connection_new_form')->with($notification);
    }

    public function deleteConnectionInfoFormSubmit(Request $request)
    {
        $id = $request['connection_info_id'];

        //  dd($id);
        $connections = (new CompanyInfoService())->getConnectionInformation($id);
        (new CustomerInfoService())->customerConnectionStatusUpdate($connections->customerAutoId, 1);
        (new CustomerInfoService())->deleteCustomerConnectionInformation($id);

        $notification = array(
            'messege' => 'Connection Delete Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('connection_new_form')->with($notification);
    }

    public function updateCustomerConnectionStatus(Request $request)
    {

        // (new CustomerInfoService())->customerConnectionStatusUpdate(
        //     $request->connectionStatusId,
        // );
        //   (new CustomerInfoService())->customerConnectionStatusUpdate($request->customerAutoId, 2);


        $notification = array(
            'messege' => 'Connection Status Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('connection_new_form')->with($notification);
    }



    //  ===================================================================
    //  ================= Connection Info API SECTION =====================
    //  ===================================================================





    public function saveConnectionInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ipAddress' => 'required',
            'userId' => 'required',
            'userPassword' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'status_code' => '401', 'error' => 'error', 'message' => $validator->errors()]);
        }

        try {
            $customerAutoId = $request->input('customerAutoId');
            $ipAddress = $request->input('ipAddress');
            $userId = $request->input('userId');
            $userPassword = $request->input('userPassword');
            $description = $request->input('description');

            $connection = (new CompanyInfoService())->insertConnectionInformation($customerAutoId, $ipAddress, $userId, $userPassword, $description);

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $connection]);
        } catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'message' => $ex->getMessage(), 'error' => 'error']);
        }
    }


    public function getConnectionInfo($id = null)
    {

        try {

            $connections = (new CompanyInfoService())->getConnectionInformation($id);
            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $connections]);
        } catch (ModelNotFoundException $ex) {
            return response()->json([
                'success' => 'false', 'status_code' => '404',
                'error' => 'Invalid:Model Not Found'
            ]);
        } catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'error' => $ex->getMessage()]);
        }
    }


    // public function deleteCustomerConnectionInformation($connectionId){

    //    $connectInfo = $this->getConnectionInfo();

    //  }









}
