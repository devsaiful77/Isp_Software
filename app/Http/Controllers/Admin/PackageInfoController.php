<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use App\Models\PackageInfo;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Validator;

class PackageInfoController extends Controller
{

    public function addNewPackageInfoForm()
    {
        $serviceTypes = (new CompanyInfoService())->getServiceTypeInformation(null);
        $packageInformations = (new CompanyInfoService())->getPackageInformation(null);
        return view('admin.package-info.package_info_add', compact('packageInformations', 'serviceTypes'));
    }

    public function editPackageInfoForm($id)
    {
        $serviceTypes = (new CompanyInfoService())->getServiceTypeInformation(null);
        $packageInfo = (new CompanyInfoService())->getPackageInformation($id);

        return view('admin.package-info.package_info_edit', compact('packageInfo', 'serviceTypes'));
    }



    public function insertPackageInfoFormSubmit(Request $request)
    {


        $this->validate($request, [
            'packageName' => 'required',
            'bandwidth' => 'required',
            'price' => 'required',
            'packageCode' => 'required',
            'serviceTypeId' => 'required',
        ], [
            'packageName.required' => 'Please enter package name!',
            'bandwidth.required' => 'Please enter package bandwidth!',
            'price.required' => 'Please enter package price!',
            'packageCode.required' => 'Please enter package code!',
            'serviceTypeId.required' => 'Please enter service name!',
        ]);

        try {

            $packageInfo = (new CompanyInfoService())
                ->insertPackageInformation(
                    $request['packageName'],
                    $request['bandwidth'],
                    $request['price'],
                    $request['packageCode'],
                    $request['serviceTypeId'],
                );

            $notification = array(
                'messege' => 'Package Info Save Success!',
                'alert-type' => 'success',
            );
            return redirect()->route('package_info_new_form')->with($notification);
        } catch (Exception $ex) {
            $notification = array(
                'messege' => 'Please Try Again!',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function updatePackageInfoFormSubmit(Request $request)
    {

        // dd($request->all());
        (new CompanyInfoService())->updatePackageInformation(
            $request->packageId,
            $request['packageName'],
            $request['bandwidth'],
            $request['price'],
            $request['packageCode'],
            $request['serviceTypeId'],
        );

        $notification = array(
            'messege' => 'Package Info Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('package_info_new_form')->with($notification);
    }

    public function deletePackageInfoFormSubmit(Request $request)
    {
        $id = $request['modal_id'];
        (new CompanyInfoService())->deletePackageInformation($id);

        $notification = array(
            'messege' => 'Package Info Delete Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('package_info_new_form')->with($notification);
    }






    //  ===================================================================
    //  ================== Package Info API SECTION =======================
    //  ===================================================================


    public function savePackageInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'packageName' => 'required',
            'bandwidth' => 'required',
            'price' => 'required',
            'packageCode' => 'required',
            'serviceTypeId' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'status_code' => '401', 'error' => 'error', 'message' => $validator->errors()]);
        }

        try {

            $packageName = $request->input('packageName');
            $bandwidth = $request->input('bandwidth');
            $price = $request->input('price');
            $packageCode = $request->input('packageCode');
            $serviceTypeId = $request->input('serviceTypeId');


            $apackage = (new CompanyInfoService())->insertPackageInformation($packageName, $bandwidth, $price, $packageCode, $serviceTypeId);


            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $apackage]);
        } catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'message' => $ex->getMessage(), 'error' => 'error']);
        }
    }


    public function getPackageInfo($id = null)
    {

        try {
            if ($id == null) {
                $packageInformations = (new CompanyInfoService())->getPackageInformation(null);
            } else {
                $apackge = (new CompanyInfoService())->getPackageInformation($id);
                $packageInformations = array($apackge);
            }
            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $packageInformations]);
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
