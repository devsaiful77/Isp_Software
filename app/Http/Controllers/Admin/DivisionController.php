<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Validator;
use Exception;

class DivisionController extends Controller
{
    public function addNewDivisionForm()
    {

        $divisions = (new CompanyInfoService())->getDivisionInformation(null);
        return view('admin.division.division_add', compact('divisions'));
    }

    public function editDivisionInfoForm($id)
    {

        $division = (new CompanyInfoService())->getDivisionInformation($id);

        return view('admin.division.division_edit', compact('division'));
    }



    public function insertDivisionInfoFormSubmit(Request $request)
    {


        $this->validate($request, [
            'divisionName' => 'required',
        ], [
            'divisionName.required' => 'Please enter division name!',
        ]);

        try {

            $division = (new CompanyInfoService())
                ->insertDivisionInformation(
                    $request['divisionName'],
                );

            if ($division) {
                $notification = array(
                    'messege' => 'Division Name Save Success!',
                    'alert-type' => 'success',
                );
                return redirect()->route('division_new_form')->with($notification);
            } else {
                $notification = array(
                    'messege' => 'Duplicate data!',
                    'alert-type' => 'error',
                );
                return redirect()->back()->with($notification);
            }

            $notification = array(
                'messege' => 'Division Save Success!',
                'alert-type' => 'success',
            );
            return redirect()->route('division_new_form')->with($notification);
        } catch (Exception $ex) {
            $notification = array(
                'messege' => 'Please Try Again!',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function updateDivisionInfoFormSubmit(Request $request)
    {
        (new CompanyInfoService())->updateDivisionInformation(
            $request->divisionId,
            $request['divisionName'],
        );

        $notification = array(
            'messege' => 'Division name Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('division_new_form')->with($notification);
    }

    public function deleteDivisionInfoFormSubmit(Request $request)
    {
        $id = $request['modal_id'];
        (new CompanyInfoService())->deleteDivisionInformation($id);

        $notification = array(
            'messege' => 'Division Delete Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('division_new_form')->with($notification);
    }





    //  ===================================================================
    //  ==================== Division SECTION ========================
    //  ===================================================================

    public function getDivisions($id = null)
    {


        try {

            $divisions = (new CompanyInfoService())->getDivisionInformation($id);
            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $divisions]);
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
