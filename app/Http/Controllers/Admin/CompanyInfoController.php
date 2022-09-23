<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use App\Http\Controllers\Helpers\FileUploadController;
use App\Models\CompanyInfo;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Validator;
use Image;
use Exception;

class CompanyInfoController extends Controller
{
    public function CompanyProfileInfoForm()
    {

        $CompanyProfile = (new CompanyInfoService())->getCompanyProfileInformation(null);

        return view('admin.company-profile.company_profile_update', compact('CompanyProfile'));
    }


    public function updateCompanyProfileInfoFormSubmit(Request $request)
    {


        $comInfo =  (new CompanyInfoService())->getCompanyProfileInformation();
        if ($comInfo == null) {
            (new CompanyInfoService())->insertCompanyProfileInformation($request);
        } else {
            (new CompanyInfoService())->updateCompanyProfileInformation(
                $request->CompanyProfileId,
                $request['ComNameBangla'],
                $request['ComNameEnlish'],
                $request['CompanyTitle'],
                $request['CompanySubTitle'],
                $request['Address'],
                $request['OwnerName1'],
                $request['OwnerName2'],
                $request['MobileNo1'],
                $request['MobileNo2'],
                $request['Email1'],
                $request['Email2'],
                $request['SupportMobileNumber'],
                $request['Description'],
                $request['CompanyMission'],
                $request['CompanyVission'],
                $request['WebAddress'],
                $request['TradeLicense'],
                $request['ISPLicense'],
                $request['Extra1'],
                $request['Extra2'],
                $request['Extra3'],
            );
        }


        $companyLogo = (new FileUploadController())->uploadCompanyLogo($request);
        (new CompanyInfoService())->updateCompanyUploadFileDBPath('Logo', $companyLogo);

        $ownerPhoto1 = (new FileUploadController())->uploadCompanyProfileOwner1Photo($request);
        (new CompanyInfoService())->updateCompanyUploadFileDBPath('OwnerPhoto1', $ownerPhoto1);

        $ownerPhoto2 = (new FileUploadController())->uploadCompanyProfileOwner2Photo($request);
        (new CompanyInfoService())->updateCompanyUploadFileDBPath('OwnerPhoto2', $ownerPhoto2);


        //  $tradeLicense = $uploadObj->uploadCompanyTradeLicense($request);
        //  $ispLicense = $uploadObj->uploadCompanyISPLicense($request);



        $notification = array(
            'messege' => 'Company Profile Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('company_profile_form')->with($notification);
    }










    //  ===================================================================
    //  ==================== COMPANY API SECTION ===========================
    //  ===================================================================



    public function saveCompanyProfileInformation(Request $request)
    {

        $comInfo =  (new ConpanyInfoService())->getCompanyProfileInformation();

        if ($comInfo == null) {

            $anEmployee = (new CompanyInfoService())->insertCompanyProfileInformation($request);

            $companyLogo = (new FileUploadController())->uploadCompanyLogo($request);
            (new CompanyInfoService())->updateCompanyUploadFileDBPath('Logo', $companyLogo);

            $ownerPhoto1 = (new FileUploadController())->uploadCompanyProfileOwner1Photo($request);
            (new CompanyInfoService())->updateCompanyUploadFileDBPath('OwnerPhoto1', $ownerPhoto1);

            $ownerPhoto2 = (new FileUploadController())->uploadCompanyProfileOwner2Photo($request);
            (new CompanyInfoService())->updateCompanyUploadFileDBPath('OwnerPhoto2', $ownerPhoto2);

            $tradeLicense = $uploadObj->uploadCompanyTradeLicense($request);
            (new CompanyInfoService())->updateCompanyUploadFileDBPath('TradeLicense', $tradeLicense);

            $ispLicense = $uploadObj->uploadCompanyISPLicense($request);
            (new CompanyInfoService())->updateCompanyUploadFileDBPath('ISPLicense', $ispLicense);
        }

        return $anEmployee->all()->last();
    }


    public function getCompanyProfileInformation($id = null)
    {

        try {
            if ($id == null) {
                $comInfo = CompanyInfo::all();
            } else {
                $comInfo = CompanyInfo::where('CompanyProfileId', $id)->get();
            }
            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $comInfo]);
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
