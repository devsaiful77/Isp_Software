<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;
use App\Models\Union;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Validator;
use Auth;

class UnionController extends Controller
{

    public function addNewUnionForm()
    {
        $upazilas = (new CompanyInfoService())->getUpazilaInformation(null);
        $unions = (new CompanyInfoService())->getUnionInformation(null);
        return view('admin.union.union_add', compact('unions', 'upazilas'));
    }

    public function editUnionInfoForm($id)
    {
        $upazilas = (new CompanyInfoService())->getUpazilaInformation(null);
        $union = (new CompanyInfoService())->getUnionInformation($id);
        return view('admin.union.union_edit', compact('union', 'upazilas'));
    }

    public function insertUnionInfoFormSubmit(Request $request)
    {

        $this->validate($request, [
            'unionName' => 'required',
            'upazilaId' => 'required',
        ], [
            'unionName.required' => 'Please enter union name!',
            'upazilaId.required' => 'Please enter upazila name!',
        ]);

        try {

            $union = (new CompanyInfoService())
                ->insertUnionInformation(
                    $request['unionName'],
                    $request['upazilaId'],
                );

            if ($union) {
                $notification = array(
                    'messege' => 'Union Name Save Success!',
                    'alert-type' => 'success',
                );
                return redirect()->route('union_new_form')->with($notification);
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

    public function updateUnionInfoFormSubmit(Request $request)
    {
        (new CompanyInfoService())->updateUnionInformation(
            $request->unionId,
            $request['unionName'],
            $request['upazilaId'],
        );

        $notification = array(
            'messege' => 'Union Name Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('union_new_form')->with($notification);
    }

    public function deleteUnionInfoFormSubmit(Request $request)
    {
        $id = $request['modal_id'];
        (new CompanyInfoService())->deleteUnionInformation($id);

        $notification = array(
            'messege' => 'Union Delete Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('union_new_form')->with($notification);
    }





    //  ===================================================================
    //  ======================= Union API SECTION =========================
    //  ===================================================================





    public function saveUnionInfo(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'upazilaName' => 'required',
            'districtId' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'status_code' => '401', 'error' => 'error', 'message' => $validator->errors()]);
        }

        try {

            $unionName = $request->input('unionName');
            $upazilaId = $request->input('upazilaId');

            $union(new CompanyInfoService())->insertUnionInformation($unionName, $upazilaId);

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $union]);
        } catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'message' => $ex->getMessage(), 'error' => 'error']);
        }
    }

    public function getUnionInfo($id = null)
    {
        try {

            $union = (new CompanyInfoService())->getUnionInformation($id);

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $union]);
        } catch (ModelNotFoundException $ex) {
            return response()->json([
                'success' => 'false', 'status_code' => '404',
                'error' => 'Invalid:Model Not Found'
            ]);
        } catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'error' => $ex->getMessage()]);
        }
    }

    public function getUnionListByUpazilla($id = null)
    {
        try {

            $union = (new CompanyInfoService())->getUnionListByUpazilla($id);

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $union]);
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
