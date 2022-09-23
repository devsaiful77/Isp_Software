<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;

class ServiceSubAreaController extends Controller
{

    public function addNewServiceSubAreaForm()
    {

        $serviceAreas = (new CompanyInfoService())->getServiceAreaInformation(null);
        $serviceSubAreas = (new CompanyInfoService())->getServiceSubAreaInformation(null);
        return view('admin.service-sub-area.service_sub_area_add', compact('serviceSubAreas', 'serviceAreas'));
    }

    public function editServiceSubAreaInfoForm($id)
    {
        $serviceAreas = (new CompanyInfoService())->getServiceAreaInformation(null);
        $serviceSubArea = (new CompanyInfoService())->getServiceSubAreaInformation($id);
        return view('admin.service-sub-area.service_sub_area_edit', compact('serviceSubArea', 'serviceAreas'));
    }



    public function insertServiceSubAreaInfoFormSubmit(Request $request)
    {

        $this->validate($request, [
            'serviceSubAreaName' => 'required',
            'serviceSubAreaRemarks' => 'required',
            'serviceAreaId' => 'required',
        ], [
            'serviceSubAreaName.required' => 'Please enter service sub area name!',
            'serviceSubAreaRemarks.required' => 'Please enter service sub area remarks!',
            'serviceAreaId.required' => 'Please enter service sub area remarks!',
        ]);

        (new CompanyInfoService())->insertServiceSubAreaInformation(
            $request['serviceSubAreaName'],
            $request['serviceSubAreaRemarks'],
            $request['serviceAreaId'],
        );

        $notification = array(
            'messege' => 'Service Sub Area Save Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('service_sub_area_new_form')->with($notification);
    }

    public function updateServiceSubAreaInfoFormSubmit(Request $request)
    {

        // dd($request->all());
        (new CompanyInfoService())->updateServiceSubAreaInformation(
            $request->serviceSubAreaId,
            $request['serviceSubAreaName'],
            $request['serviceSubAreaRemarks'],
            $request['serviceAreaId'],
        );

        $notification = array(
            'messege' => 'Service Sub Area Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('service_sub_area_new_form')->with($notification);
    }

    public function deleteServiceSubAreaInfoFormSubmit(Request $request)
    {
        $id = $request['modal_id'];
        (new CompanyInfoService())->deleteServiceSubAreaInformation($id);

        $notification = array(
            'messege' => 'Service Sub Area Delete Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('service_sub_area_new_form')->with($notification);
    }
}
