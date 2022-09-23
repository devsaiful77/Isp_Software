<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Validator;
use Session;
use Exception;
use Auth;



class ConnectionStatusController extends Controller
{

    public function addNewConnectionStatusForm()
    {

        $connectionStatus = (new CompanyInfoService())->getConnectionStatusInformation(null);
        return view('admin.connection-status.connection_status_add', compact('connectionStatus'));
    }

    public function editConnectionStatusInfoForm($id)
    {
        $connectionStatus = (new CompanyInfoService())->getConnectionStatusInformation($id);
        return view('admin.connection-status.connection_status_edit', compact('connectionStatus'));
    }



    public function insertConnectionStatusInfoFormSubmit(Request $request)
    {

        $this->validate($request, [
            'connectionName' => 'required',
        ], [
            'connectionName.required' => 'Please enter connection status name!',
        ]);

        (new CompanyInfoService())->insertConnectionStatusInformation(
            $request['connectionName'],
        );

        $notification = array(
            'messege' => 'Connection Status Save Success!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function updateConnectionStatusInfoFormSubmit(Request $request)
    {

        // dd($request->all());
        (new CompanyInfoService())->updateConnectionStatusInformation(
            $request->connectionStatusId,
            $request['connectionName'],
        );

        $notification = array(
            'messege' => 'Connection Status Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('connection_status_area_new_form')->with($notification);
    }

    public function deleteConnectionStatusInfoFormSubmit(Request $request)
    {

        $id = $request['modal_id'];
        (new CompanyInfoService())->deleteConnectionStatusInformation($id);

        $notification = array(
            'messege' => 'Connection Status Delete Success!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }






    //  ===================================================================
    //  ==================== Connection Status API SECTION ===========================
    //  ===================================================================


    public function saveConnectionStatusInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'connectionName' => 'required'

        ]);

        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'status_code' => '401', 'error' => 'error', 'message' => $validator->errors()]);
        }

        try {

            $connectionStatus = (new CompanyInfoService())
                ->insertConnectionStatusInformation(
                    $request['connectionName']
                );

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $connectionStatus]);
        } catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'message' => $ex->getMessage(), 'error' => 'error']);
        }
    }


    public function getConnectionStatusInfo($id = null){
        try{
            $connectionStatus = (new CompanyInfoService())->getConnectionStatusInformation($id);
            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $connectionStatus]);
        }
        catch(ModelNotFoundException $ex){
            return response()->json(['success' => 'false', 'status_code' => '404', 'error' => 'Invalid:Model Not Found']);
        }
        catch(Exception $ex){
            return response()->json(['success' => 'false', 'status_code' => '500', 'error' => $ex->getMessage()]);
        }
    }
}
