<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;


class ServiceAreaController extends Controller
{

    public function addNewServiceAreaForm()
    {

        $serviceAreas = (new CompanyInfoService())->getServiceAreaInformation(null);
        return view('admin.service-area.service_area_add', compact('serviceAreas'));
    }

    public function editServiceAreaInfoForm($id)
    {
        $serviceArea = (new CompanyInfoService())->getServiceAreaInformation($id);
        return view('admin.service-area.service_area_edit', compact('serviceArea'));
    }



    public function insertServiceAreaInfoFormSubmit(Request $request)
    {

        $this->validate($request, [
            'serviceAreaName' => 'required',
            'serviceAreaRemarks' => 'required',
        ], [
            'serviceAreaName.required' => 'Please enter service area name!',
            'serviceAreaRemarks.required' => 'Please enter service area remarks!',
        ]);

        (new CompanyInfoService())->insertServiceAreaInformation(
            $request['serviceAreaName'],
            $request['serviceAreaRemarks'],
        );

        $notification = array(
            'messege' => 'Service Area Save Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('service_area_new_form')->with($notification);
    }

    public function updateServiceAreaInfoFormSubmit(Request $request)
    {

        // dd($request->all());
        (new CompanyInfoService())->updateServiceAreaInformation(
            $request->serviceAreaId,
            $request['serviceAreaName'],
            $request['serviceAreaRemarks'],
        );

        $notification = array(
            'messege' => 'Service Area Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('service_area_new_form')->with($notification);
    }

    public function deleteServiceAreaInfoFormSubmit(Request $request)
    {
        $id = $request['modal_id'];
        (new CompanyInfoService())->deleteServiceAreaInformation($id);

        $notification = array(
            'messege' => 'Service Area Delete Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('service_area_new_form')->with($notification);
    }
}
