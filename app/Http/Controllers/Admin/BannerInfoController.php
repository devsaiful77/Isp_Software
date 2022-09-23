<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\Models\BannerInfo;
use Validator;
use Session;
use Exception;

class BannerInfoController extends Controller
{

    public function addNewBannerForm()
    {

        $banners = (new CompanyInfoService())->getBannerInformation(null);
        return view('admin.banner.banner_add', compact('banners'));
    }

    public function editBannerInfoForm($id)
    {

        $banner = (new CompanyInfoService())->getBannerInformation($id);

        return view('admin.banner.banner_edit', compact('banner'));
    }



    public function insertBannerInfoFormSubmit(Request $request)
    {


        $this->validate($request, [
            'bannerName' => 'required',
            'bannerTitle' => 'required',
            'bannerSubTitle' => 'required',
            'bannerUrl' => 'required',
        ], [
            'bannerName.required' => 'Please enter banner name!',
            'bannerTitle.required' => 'Please enter banner title!',
            'bannerSubTitle.required' => 'Please enter banner subtitle!',
            'bannerUrl.required' => 'Please enter banner URL!',
        ]);

        try {

            $banner = (new CompanyInfoService())
                ->insertBannerInformation(
                    $request['bannerName'],
                    $request['bannerTitle'],
                    $request['bannerSubTitle'],
                    $request['bannerUrl']
                );

            $notification = array(
                'messege' => 'Banner Save Success!',
                'alert-type' => 'success',
            );
            return redirect()->route('banner_new_form')->with($notification);
        } catch (Exception $ex) {
            $notification = array(
                'messege' => 'Please Try Again!',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function updateBannerInfoFormSubmit(Request $request)
    {

        // dd($request->all());
        (new CompanyInfoService())->updateBannerInformation(
            $request->bannerId,
            $request['bannerName'],
            $request['bannerTitle'],
            $request['bannerSubTitle'],
            $request['bannerUrl']
        );

        $notification = array(
            'messege' => 'Banner Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('banner_new_form')->with($notification);
    }

    public function deleteBannerInformationFormSubmit(Request $request)
    {
        $id = $request['modal_id'];
        (new CompanyInfoService())->deleteBannerInformation($id);

        $notification = array(
            'messege' => 'Banner Delete Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('banner_new_form')->with($notification);
    }






    //  ===================================================================
    //  ==================== BANNER API SECTION ===========================
    //  ===================================================================


    public function saveWebsiteBannerInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bannerName' => 'required',
            'bannerTitle' => 'required',
            'bannerSubTitle' => 'required',
            'bannerUrl' => 'required'

        ]);

        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'status_code' => '401', 'error' => 'error', 'message' => $validator->errors()]);
        }

        try {

            $banner = (new CompanyInfoService())
                ->insertBannerInformation(
                    $request['bannerName'],
                    $request['bannerTitle'],
                    $request['bannerSubTitle'],
                    $request['bannerUrl']
                );

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $banner]);
        } catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'message' => $ex->getMessage(), 'error' => 'error']);
        }
    }


    public function getWebsiteBannerInfo($id = null)
    {

        try {

            $banners = (new CompanyInfoService())->getBannerInformation($id);

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $banners]);
        } catch (ModelNotFoundException $ex) {
            return response()->json(['success' => 'false', 'status_code' => '404', 'error' => 'Invalid:Model Not Found']);
        } catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'error' => $ex->getMessage()]);
        }
    }
}
