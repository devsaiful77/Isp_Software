<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Validator;

class ServiceTypeController extends Controller
{

    public function addNewServiceTypeForm()
    {


        $serviceTypes = (new CompanyInfoService())->getServiceTypeInformation(null);
        return view('admin.service-type.service_type_add', compact('serviceTypes'));
    }

    public function editServiceTypeInfoForm($id)
    {

        $serviceType = (new CompanyInfoService())->getServiceTypeInformation($id);

        return view('admin.service-type.service_type_edit', compact('serviceType'));
    }



    public function insertServiceTypeInfoFormSubmit(Request $request)
    {


        $this->validate($request, [
            'serviceName' => 'required',
        ], [
            'serviceName.required' => 'Please enter service name!',
        ]);

        try {

            $serviceType = (new CompanyInfoService())
                ->insertServiceTypeInformation(
                    $request['serviceName'],
                );

            $notification = array(
                'messege' => 'Service Type Save Success!',
                'alert-type' => 'success',
            );
            return redirect()->route('service_type_new_form')->with($notification);
        } catch (Exception $ex) {
            $notification = array(
                'messege' => 'Please Try Again!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function updateServiceTypeInfoFormSubmit(Request $request)
    {

        // dd($request->all());
        (new CompanyInfoService())->updateServiceTypeInformation(
            $request->serviceTypeId,
            $request['serviceName'],
        );

        $notification = array(
            'messege' => 'Service Type Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('service_type_new_form')->with($notification);
    }

    public function deleteServiceTypeInfoFormSubmit(Request $request)
    {
        $id = $request['modal_id'];
        (new CompanyInfoService())->deleteServiceTypeInformation($id);

        $notification = array(
            'messege' => 'Service Type Delete Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('service_type_new_form')->with($notification);
    }





    //  ===================================================================
    //  ==================== SERVICE TYPE SECTION ===========================
    //  ===================================================================


    public function getServices($id = null)
    {

        try {

            $serviceTypes = (new CompanyInfoService())->getServiceTypeInformation($id);

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $serviceTypes]);
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
