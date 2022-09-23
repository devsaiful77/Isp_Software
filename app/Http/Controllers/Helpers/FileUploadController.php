<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class FileUploadController extends Controller{


      /*
    =================================================================
    ==================== BANNER IMAGE FILE UPLOAD ================
    =================================================================
    */

    public function uploadBannerImage(Request $request) {
        if($request->hasFile('bannerImage')) {
            $file = $request->file('bannerImage');
            $destinationPath = "uploads/banner";
            $fileName = rand(100000,999999).'.jpg';
            $file->move($destinationPath,$fileName);

            return $destinationPath.'/'.$fileName;
        
        }
        
        return '';
    }





    /*
    =================================================================
    ==================== COMPANY PROFILE FILE UPLOAD ================
    =================================================================
    */



   public function uploadCompanyLogo(Request $request) {
    if($request->hasFile('Logo')) {
         $file = $request->file('Logo');
    $destinationPath = "uploads/company_profile";
    $fileName = rand(100000,999999).'.jpg';
    $file->move($destinationPath,$fileName);
    return $destinationPath.'/'.$fileName;
      }
   return '';
}
    
    public function uploadCompanyProfileOwner1Photo(Request $request) {
        if($request->hasFile('OwnerPhoto1')) {
             $file = $request->file('OwnerPhoto1');
        $destinationPath = "uploads/company_profile";
        $fileName = rand(100000,999999).'.jpg';
        $file->move($destinationPath,$fileName);
        return $destinationPath.'/'.$fileName;
        }
        return '';
    }

   public function uploadCompanyProfileOwner2Photo(Request $request) {
    if($request->hasFile('OwnerPhoto2')) {
         $file = $request->file('OwnerPhoto2');
    $destinationPath = "uploads/company_profile";
    $fileName = rand(100000,999999).'.jpg';
    $file->move($destinationPath,$fileName);
    return $destinationPath.'/'.$fileName;
}
return '';
}



   public function uploadCompanyTradeLicense(Request $request) {
    if($request->hasFile('TradeLicense')) {
         $file = $request->file('TradeLicense');
    $destinationPath = "uploads/company_profile";
    $fileName = rand(100000,999999).'.jpg';
    $file->move($destinationPath,$fileName);
    return $destinationPath.'/'.$fileName;
      }
   return '';
}





public function uploadCompanyISPLicense($request,$vendorProfile) {
    
   if($request->hasFile('ISPLicense')) {
        $file = $request->file('ISPLicense');
   $destinationPath = "uploads/company_profile";
   $fileName = rand(100000,999999).'.jpg';
   $file->move($destinationPath,$fileName);
   return $destinationPath.'/'.$fileName;
     }
  return '';
}
    


public function uploadWebsiteBanner($request,$vendorProfile) {
    
    if($request->hasFile('bannerUrl')) {
         $file = $request->file('bannerUrl');
    $destinationPath = "uploads/company_profile/banner";
    $fileName = rand(100000,999999).'.jpg';
    $file->move($destinationPath,$fileName);
    return $destinationPath.'/'.$fileName;
      }
   return '';
 }


/*
    =================================================================
    ==================== EMPOYEE PROFILE FILE UPLOAD ================
    =================================================================
    */

public function uploadEmployeeProfileImage(Request $request) {
        if($request->hasFile('Photo')) {
             $file = $request->file('vendor_image');
        $destinationPath = "uploads/employee_photos";
        $fileName = rand(100000,999999).'.jpg';
        $file->move($destinationPath,$fileName);
        return $destinationPath.'/'.$fileName;
    }
    return '';
   }



   public function uploadEmployeeNIDImage(Request $request) {
    if($request->hasFile('NID')) {
         $file = $request->file('NID');
    $destinationPath = "uploads/employee_nid";
    $fileName = rand(100000,999999).'.jpg';
    $file->move($destinationPath,$fileName);
    return $destinationPath.'/'.$fileName;
      }
   return '';
}
public function updateVendorImage($request,$vendorProfile) {
    if($request->hasFile('vendor_image')) {
       if(file_exists($vendorProfile->vendor_image))
       {
           unlink($vendorProfile->vendor_image);
       }
        $file = $request->file('vendor_image');
        $destinationPath = "uploads/vendor_photos";
        $fileName = rand(100000,999999).'.jpg';
        $file->move($destinationPath,$fileName);
        return $destinationPath.'/'.$fileName;
    }
}




public function updateCustomerImage($request,$vendorProfile) {
    if($request->hasFile('photo')) {
       if(file_exists($vendorProfile->photo))
       {
           unlink($vendorProfile->photo);
       }
        $file = $request->file('photo');
        $destinationPath = "uploads/user_photos";
        $fileName = rand(100000,999999).'.jpg';
        $file->move($destinationPath,$fileName);
        return $destinationPath.'/'.$fileName;
    }
  }
 

}
