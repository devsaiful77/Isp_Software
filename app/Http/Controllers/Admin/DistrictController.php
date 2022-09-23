<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Validator;
use Exception;

class DistrictController extends Controller
{
    public function addNewDistrictForm()
    {

        $divisions = (new CompanyInfoService())->getDivisionInformation(null);
        $districts = (new CompanyInfoService())->getDistrictInformation(null);
        return view('admin.district.district_add', compact('districts', 'divisions'));
    }

    public function editDistrictInfoForm($id)
    {
        $divisions = (new CompanyInfoService())->getDivisionInformation(null);
        $district = (new CompanyInfoService())->getDistrictInformation($id);

        return view('admin.district.district_edit', compact('district', 'divisions'));
    }



    public function insertDistrictInfoFormSubmit(Request $request)
    {


        $this->validate($request, [
            'districtName' => 'required',
            'divisionId' => 'required',
        ], [
            'districtName.required' => 'Please enter division name!',
            'divisionId.required' => 'Please enter division name!',
        ]);

        try {

            $district = (new CompanyInfoService())
                ->insertDistrictInformation(
                    $request['districtName'],
                    $request['divisionId'],
                );

            if ($district) {
                $notification = array(
                    'messege' => 'District Name Save Success!',
                    'alert-type' => 'success',
                );
                return redirect()->route('district_new_form')->with($notification);
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

        $notification = array(
            'messege' => 'District Save Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('district_new_form')->with($notification);
    }

    public function updateDistrictInfoFormSubmit(Request $request)
    {
        (new CompanyInfoService())->updateDistrictInformation(
            $request->districtId,
            $request['districtName'],
            $request['divisionId'],
        );

        $notification = array(
            'messege' => 'District name Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('district_new_form')->with($notification);
    }

    public function deleteDistrictInfoFormSubmit(Request $request)
    {
        $id = $request['modal_id'];
        (new CompanyInfoService())->deleteDistrictInformation($id);

        $notification = array(
            'messege' => 'District Delete Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('district_new_form')->with($notification);
    }





    //  ===================================================================
    //  ======================= District SECTION ==========================
    //  ===================================================================



    public function saveDistrictInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'districtName' => 'required',
            'divisionId' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'status_code' => '401', 'error' => 'error', 'message' => $validator->errors()]);
        }

        try {
            $districtName = $request->input('districtName');
            $divisionId = $request->input('divisionId');

            $district(new CompanyInfoService())->insertPackageInformation($districtName, $divisionId);

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $district]);
        } catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'message' => $ex->getMessage(), 'error' => 'error']);
        }
    }

    public function getDistrictInfo($id = null)
    {

        try {

            $districts = (new CompanyInfoService())->getDistrictInformation($id);
            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $districts]);
        } catch (ModelNotFoundException $ex) {
            return response()->json([
                'success' => 'false', 'status_code' => '404',
                'error' => 'Invalid:Model Not Found'
            ]);
        } catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'error' => $ex->getMessage()]);
        }
    }
    public function getDistrictListbyDivisionId($id = null)
    {

        try {

            $districts = (new CompanyInfoService())->getDistrictListbyDivisionId($id);
            if ($districts == null) {
                return response()->json(['success' => 'false', 'status_code' => '200', 'data' => '']);
            } else {
                return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $districts]);
            }
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
