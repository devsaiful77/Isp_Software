<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use App\Models\Upazila;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use Exception;


class UpazilaController extends Controller
{
    public function addNewUpazilaForm()
    {
        $districts = (new CompanyInfoService())->getDistrictInformation(null);
        $upazilas = (new CompanyInfoService())->getUpazilaInformation(null);
        return view('admin.upazila.upazila_add', compact('upazilas', 'districts'));
    }

    public function editUpazilaInfoForm($id)
    {
        $districts = (new CompanyInfoService())->getDistrictInformation(null);
        $upazila = (new CompanyInfoService())->getUpazilaInformation($id);
        return view('admin.upazila.upazila_edit', compact('upazila', 'districts'));
    }

    public function insertUpazilaInfoFormSubmit(Request $request)
    {

        $this->validate($request, [
            'upazilaName' => 'required',
            'districtId' => 'required',
        ], [
            'upazilaName.required' => 'Please enter upazila name!',
            'districtId.required' => 'Please enter district name!',
        ]);

        try {

            $upazila = (new CompanyInfoService())
                ->insertUpazilaInformation(
                    $request['upazilaName'],
                    $request['districtId'],
                );

            if ($upazila) {
                $notification = array(
                    'messege' => 'Upazila Name Save Success!',
                    'alert-type' => 'success',
                );
                return redirect()->route('upazila_new_form')->with($notification);
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

    public function updateUpazilaInfoFormSubmit(Request $request)
    {
        (new CompanyInfoService())->updateUpazilaInformation(
            $request->upazilaId,
            $request['upazilaName'],
            $request['districtId'],
        );

        $notification = array(
            'messege' => 'Upazila Name Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('upazila_new_form')->with($notification);
    }

    public function deleteUpazilaInfoFormSubmit(Request $request)
    {
        $id = $request['modal_id'];
        (new CompanyInfoService())->deleteUpazilaInformation($id);

        $notification = array(
            'messege' => 'Upazila Delete Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('upazila_new_form')->with($notification);
    }





    //  ===================================================================
    //  ======================= Upazila API SECTION =======================
    //  ===================================================================





    public function saveUpazilaInfo(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'upazilaName' => 'required',
            'districtId' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'status_code' => '401', 'error' => 'error', 'message' => $validator->errors()]);
        }

        try {

            $districtId = $request->input('districtId');
            $upazilaName = $request->input('upazilaName');

            $upazila = (new CompanyInfoService())->insertUpazilaInformation($districtId, $upazilaName);

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $upazila]);
        } catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'message' => $ex->getMessage(), 'error' => 'error']);
        }
    }

    public function getUpazilaInfo($id = null)
    {
        try {

            $upazila = (new CompanyInfoService())->getUpazilaInformation($id);

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $upazila]);
        } catch (ModelNotFoundException $ex) {
            return response()->json([
                'success' => 'false', 'status_code' => '404',
                'error' => 'Invalid:Model Not Found'
            ]);
        } catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'error' => $ex->getMessage()]);
        }
    }

    public function getUpazilaListByDistrictId($id = null)
    {
        try {

            $upazila = (new CompanyInfoService())->getUpazilaListByDistrictId($id);
            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $upazila]);
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
