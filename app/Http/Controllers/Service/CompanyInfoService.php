<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Str;
use Illuminate\Http\Request;
use App\Models\BannerInfo;
use App\Models\CompanyInfo;
use App\Models\ServiceType;
use App\Models\PackageInfo;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;
use App\Models\PopAddress;
use App\Models\ConnectionInfo;
use App\Models\ServiceArea;
use App\Models\ServiceSubArea;
use App\Models\DrVoucher;
use App\Models\OtherIncome;
use App\Models\User;
use App\Models\DrebitType;
use App\Models\Month;
use App\Models\ProductPurchase;
use App\Models\ConnectionStatus;
use App\Models\Offer;
use Carbon\Carbon;
use DateTime;
use Session;
use Image;

class CompanyInfoService extends Controller
{
    public function getMonths($monthId)
    {
        if ($monthId == null) {
            return Month::get();
        } else {
            return Month::where('month_id', $monthId)->first();
        }
    }

    //user
    public function getUserInformation($id)
    {
        if ($id == null) {
            return  $users = User::all();
        } else {
            return  $users = User::where('id', $id)->first();
        }
    }

    public function getMonthEnglishName($monthId)
    {
        return (Month::where('month_id', $monthId)->first())->month_name;
    }


    public function insertBannerInformation($bannerName, $bannerTitle, $bannerSubTitle, $bannerUrl)
    {

        return $insert = BannerInfo::insertGetId([
            'bannerName' => $bannerName,
            'bannerTitle' => $bannerTitle,
            'bannerSubTitle' => $bannerSubTitle,
            'bannerUrl' => $bannerUrl,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function getBannerInformation($id)
    {
        if ($id == null) {
            return BannerInfo::where('isActive', 1)->get();
        } else {
            return BannerInfo::where('bannerId', $id)->where('isActive', 1)->first();
        }
    }

    public function updateBannerInformation($id, $bannerName, $bannerTitle, $bannerSubTitle, $bannerUrl)
    {
        return $update = BannerInfo::where('bannerId', $id)->update([
            'bannerName' => $bannerName,
            'bannerTitle' => $bannerTitle,
            'bannerSubTitle' => $bannerSubTitle,
            'bannerUrl' => $bannerUrl,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
    }


    public function deleteBannerInformation($id)
    {
        return $update = BannerInfo::where('bannerId', $id)->update([
            'isActive' => 0,
        ]);
    }


    // CompanyInfo

    public function getCompanyProfileInformation()
    {
        return $CompanyProfile = CompanyInfo::where('CompanyProfileId', 1)->firstOrFail();
    }

    public function insertCompanyProfileInformation($ComNameBangla, $ComNameEnlish, $CompanyTitle, $CompanySubTitle, $Address, $OwnerName1, $OwnerName2, $MobileNo1, $MobileNo2, $Email1, $Email2, $SupportMobileNumber, $Description, $CompanyMission, $CompanyVission, $WebAddress, $TradeLicense, $ISPLicense, $Extra1, $Extra2, $Extra3)
    {

        return $insertId = CompanyInfo::insertGetId([
            'ComNameBangla' => $ComNameBangla,
            'ComNameEnlish' => $ComNameEnlish,
            'CompanyTitle' => $CompanyTitle,
            'CompanySubTitle' => $CompanySubTitle,
            'Address' => $Address,
            'OwnerName1' => $OwnerName1,
            'OwnerName2' => $OwnerName2,
            'MobileNo1' => $MobileNo1,
            'MobileNo2' => $MobileNo2,
            'Email1' => $Email1,
            'Email2' => $Email2,
            'SupportMobileNumber' => $SupportMobileNumber,
            'Description' => $Description,
            'CompanyMission' => $CompanyMission,
            'CompanyVission' => $CompanyVission,
            'WebAddress' => $WebAddress,
            'TradeLicense' => $TradeLicense,
            'ISPLicense' => $ISPLicense,
            'Extra1' => $Extra1,
            'Extra2' => $Extra2,
            'Extra3' => $Extra3,
        ]);
    }

    public function updateCompanyProfileInformation($id, $ComNameBangla, $ComNameEnlish, $CompanyTitle, $CompanySubTitle, $Address, $OwnerName1, $OwnerName2, $MobileNo1, $MobileNo2, $Email1, $Email2, $SupportMobileNumber, $Description, $CompanyMission, $CompanyVission, $WebAddress, $TradeLicense, $ISPLicense, $Extra1, $Extra2, $Extra3)
    {
        return $update = CompanyInfo::where('CompanyProfileId', $id)->update([
            'ComNameBangla' => $ComNameBangla,
            'ComNameEnlish' => $ComNameEnlish,
            'CompanyTitle' => $CompanyTitle,
            'CompanySubTitle' => $CompanySubTitle,
            'Address' => $Address,
            'OwnerName1' => $OwnerName1,
            'OwnerName2' => $OwnerName2,
            'MobileNo1' => $MobileNo1,
            'MobileNo2' => $MobileNo2,
            'Email1' => $Email1,
            'Email2' => $Email2,
            'SupportMobileNumber' => $SupportMobileNumber,
            'Description' => $Description,
            'CompanyMission' => $CompanyMission,
            'CompanyVission' => $CompanyVission,
            'WebAddress' => $WebAddress,
            'TradeLicense' => $TradeLicense,
            'ISPLicense' => $ISPLicense,
            'Extra1' => $Extra1,
            'Extra2' => $Extra2,
            'Extra3' => $Extra3,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function updateCompanyUploadFileDBPath($columnName, $filePath)
    {
        CompanyInfo::where('CompanyProfileId', 1)->update([
            $columnName => $filePath,
        ]);
        //OwnerPhoto1
    }


    // Service Type
    public function insertServiceTypeInformation($serviceName)
    {

        return $insert = ServiceType::insertGetId([
            'serviceName' => $serviceName,
        ]);
    }

    public function getServiceTypeInformation($id)
    {
        if ($id == null) {
            return  $serviceTypes = ServiceType::all();
        } else {
            return  $serviceTypes = ServiceType::where('serviceTypeId', $id)->first();
        }
    }

    public function updateServiceTypeInformation($id, $serviceName)
    {
        return $update = ServiceType::where('serviceTypeId', $id)->update([
            'serviceName' => $serviceName,
        ]);
    }

    public function deleteServiceTypeInformation($id)
    {
        return $delete = ServiceType::where('serviceTypeId', $id)->delete();
    }


    // Package Info
    public function insertPackageInformation($packageName, $bandwidth, $price, $packageCode, $serviceTypeId)
    {

        $insertId = PackageInfo::insertGetId([
            'packageName' => $packageName,
            'bandwidth' => $bandwidth,
            'price' => $price,
            'packageCode' => $packageCode,
            'serviceTypeId' => $serviceTypeId,
        ]);

        if ($insertId > 0) {
            return $this->getPackageInformation($insertId);
        }

        return null;
    }

    public function getPackageInformation($id)
    {
        if ($id == null) {
            return  $packageInformations = PackageInfo::all();
        } else {
            return PackageInfo::where('packageId', $id)->first();
        }
    }

    public function updatePackageInformation($id, $packageName, $bandwidth, $price, $packageCode, $serviceTypeId)
    {
        return $update = PackageInfo::where('packageId', $id)->update([
            'packageName' => $packageName,
            'bandwidth' => $bandwidth,
            'price' => $price,
            'packageCode' => $packageCode,
            'serviceTypeId' => $serviceTypeId,
        ]);
    }

    public function deletePackageInformation($id)
    {
        return PackageInfo::where('packageId', $id)->delete();
    }


    // Division

    public function searchDivisionInformation($name)
    {
        $name = Str::lower($name);
        $division = Division::where(Str::lower('divisionName'), $name)->first();

        if ($division == null) {
            return false;
        } else {
            return true;
        }
    }

    public function insertDivisionInformation($divisionName)
    {
        if ($this->searchdivisionInformation($divisionName)) {
            return null;
        } else {
            return $insert = Division::insertGetId([
                'divisionName' => $divisionName,
            ]);
        }
    }

    public function getDivisionInformation($id)
    {
        if ($id == null) {
            return  $divisions = Division::all();
        } else {
            return  $divisions = Division::where('divisionId', $id)->first();
        }
    }

    public function updateDivisionInformation($id, $divisionName)
    {
        return $update = Division::where('divisionId', $id)->update([
            'divisionName' => $divisionName,
        ]);
    }

    public function deleteDivisionInformation($id)
    {
        return $delete = Division::where('divisionId', $id)->delete();
    }


    // District

    public function searchDistrictInformation($name)
    {
        $name = Str::lower($name);
        $district = District::where(Str::lower('districtName'), $name)->first();

        if ($district == null) {
            return false;
        } else {
            return true;
        }
    }

    public function insertDistrictInformation($districtName, $divisionId)
    {
        if ($this->searchDistrictInformation($districtName)) {
            return null;
        } else {
            return $insert = District::insertGetId([
                'districtName' => $districtName,
                'divisionId' => $divisionId,
            ]);
        }
    }

    public function getDistrictInformation($id)
    {
        if ($id == null) {
            return  $districts = District::all();
        } else {
            return  $districts = District::where('districtId', $id)->first();
        }
    }
    public function getDistrictListbyDivisionId($id)
    {
        if ($id == null) {
            return  $districts = District::all();
        } else {
            return  $districts = District::where('divisionId', $id)->get();
        }
    }

    public function updateDistrictInformation($id, $districtName, $divisionId)
    {
        return $update = District::where('districtId', $id)->update([
            'districtName' => $districtName,
            'divisionId' => $divisionId,
        ]);
    }

    public function deleteDistrictInformation($id)
    {
        return $delete = District::where('districtId', $id)->delete();
    }


    // Upazila

    public function searchUpazilaInformation($name)
    {
        $name = Str::lower($name);
        $upazila = Upazila::where(Str::lower('upazilaName'), $name)->first();

        if ($upazila == null) {
            return false;
        } else {
            return true;
        }
    }

    public function insertUpazilaInformation($upazilaName, $districtId)
    {
        if ($this->searchUpazilaInformation($upazilaName)) {
            return null;
        } else {
            return $insert = Upazila::insertGetId([

                'upazilaName' => $upazilaName,
                'districtId' => $districtId,
            ]);
        }
    }

    public function getUpazilaInformation($id)
    {
        if ($id == null) {
            return  $upazilas = Upazila::all();
        } else {
            return  $upazilas = Upazila::where('upazilaId', $id)->first();
        }
    }
    public function getUpazilaListByDistrictId($id)
    {
        if ($id == null) {
            return  $upazilas = Upazila::all();
        } else {
            return  $upazilas = Upazila::where('districtId', $id)->get();
        }
    }

    public function updateUpazilaInformation($id, $upazilaName, $districtId)
    {
        return $update = Upazila::where('upazilaId', $id)->update([
            'upazilaName' => $upazilaName,
            'districtId' => $districtId,
        ]);
    }

    public function deleteUpazilaInformation($id)
    {
        return $delete = Upazila::where('upazilaId', $id)->delete();
    }


    // Union

    public function searchUnionInformation($name)
    {
        $name = Str::lower($name);
        $union = Union::where(Str::lower('unionName'), $name)->first();

        if ($union == null) {
            return false;
        } else {
            return true;
        }
    }

    public function insertUnionInformation($unionName, $upazilaId)
    {

        if ($this->searchUnionInformation($unionName)) {
            return null;
        } else {
            return $insert = Union::insertGetId([

                'unionName' => $unionName,
                'upazilaId' => $upazilaId,
            ]);
        }
    }

    public function getUnionInformation($id)
    {
        if ($id == null) {
            return  $unions = Union::all();
        } else {
            return  $unions = Union::where('unionId', $id)->first();
        }
    }

    public function getUnionListByUpazilla($id)
    {
        if ($id == null) {
            return  $unions = Union::all();
        } else {
            return  $unions = Union::where('upazilaId', $id)->get();
        }
    }



    public function updateUnionInformation($id, $unionName, $upazilaId)
    {
        return $update = Union::where('unionId', $id)->update([
            'unionName' => $unionName,
            'upazilaId' => $upazilaId,
        ]);
    }

    public function deleteUnionInformation($id)
    {
        return $delete = Union::where('unionId', $id)->delete();
    }


    // Pop Address
    public function insertPopAddressInformation($pop_name, $pop_email, $pop_phone, $pop_address)
    {

        return PopAddress::insertGetId([
            'pop_name' => $pop_name,
            'pop_email' => $pop_email,
            'pop_phone' => $pop_phone,
            'pop_address' => $pop_address,
        ]);
    }

    public function getPopAddressInformation($id)
    {
        if ($id == null) {
            return PopAddress::where('pop_status', 1)->get();
        } else {
            return PopAddress::where('pop_id', $id)->first();
        }
    }

    public function updatePopAddressInformation($id, $pop_name, $pop_email, $pop_phone, $pop_address)
    {
        return PopAddress::where('pop_id', $id)->update([
            'pop_name' => $pop_name,
            'pop_email' => $pop_email,
            'pop_phone' => $pop_phone,
            'pop_address' => $pop_address,
        ]);
    }

    public function deletePopAddressInformation($id)
    {
        return PopAddress::where('pop_id', $id)->update([
            'pop_status' => 0,
        ]);
    }





    // Connection Info
    public function insertConnectionInformation($customerId, $ipAddress, $userId, $userPassword, $description)
    {
        return ConnectionInfo::insertGetId([
            'customerId' => $customerId,
            'ipAddress' => $ipAddress,
            'userId' => $userId,
            'userPassword' => $userPassword,
            'description' => $description,
        ]);
    }

    public function getConnectionInformation($id)
    {
        if ($id == null) {
            return  $connectionInfo = ConnectionInfo::leftjoin('customers', 'connection_infos.customerId', '=', 'customers.customerAutoId')->get();
        } else {
            return  $connectionInfo = ConnectionInfo::where('connectionId', $id)
                ->leftjoin('customers', 'connection_infos.customerId', '=', 'customers.customerAutoId')
                ->first();
        }
    }

    public function updateConnectionInformation($id, $customerId, $ipAddress, $userId, $userPassword, $description)
    {
        return $update = ConnectionInfo::where('connectionId', $id)->update([
            'customerId' => $customerId,
            'ipAddress' => $ipAddress,
            'userId' => $userId,
            'userPassword' => $userPassword,
            'description' => $description,
        ]);
    }
    public function deleteConnectionInformation($id)
    {
        return $delete = ConnectionInfo::where('connectionId', $id)->delete();
    }

    // Service Area
    public function insertServiceAreaInformation($serviceAreaName, $serviceAreaRemarks)
    {
        return $insert = ServiceArea::insertGetId([
            'serviceAreaName' => $serviceAreaName,
            'serviceAreaRemarks' => $serviceAreaRemarks,
        ]);
    }

    public function getServiceAreaInformation($id)
    {
        if ($id == null) {
            return  $serviceArea = ServiceArea::all();
        } else {
            return  $serviceArea = ServiceArea::where('serviceAreaId', $id)->first();
        }
    }

    public function updateServiceAreaInformation($id, $serviceAreaName, $serviceAreaRemarks)
    {
        return $update = ServiceArea::where('serviceAreaId', $id)->update([
            'serviceAreaName' => $serviceAreaName,
            'serviceAreaRemarks' => $serviceAreaRemarks,
        ]);
    }

    public function deleteServiceAreaInformation($id)
    {
        return $delete = ServiceArea::where('serviceAreaId', $id)->delete();
    }

    // Service Sub Area
    public function insertServiceSubAreaInformation($serviceSubAreaName, $serviceSubAreaRemarks, $serviceAreaId)
    {
        return $insert = ServiceSubArea::insertGetId([
            'serviceSubAreaName' => $serviceSubAreaName,
            'serviceSubAreaRemarks' => $serviceSubAreaRemarks,
            'serviceAreaId' => $serviceAreaId,
        ]);
    }

    public function getServiceSubAreaInformation($id)
    {
        if ($id == null) {
            return  $serviceArea = ServiceSubArea::all();
        } else {
            return  $serviceArea = ServiceSubArea::where('serviceSubAreaId', $id)->first();
        }
    }

    public function updateServiceSubAreaInformation($id, $serviceSubAreaName, $serviceSubAreaRemarks, $serviceAreaId)
    {
        return $update = ServiceSubArea::where('serviceSubAreaId', $id)->update([
            'serviceSubAreaName' => $serviceSubAreaName,
            'serviceSubAreaRemarks' => $serviceSubAreaRemarks,
            'serviceAreaId' => $serviceAreaId,
        ]);
    }

    public function deleteServiceSubAreaInformation($id)
    {
        return $delete = ServiceSubArea::where('serviceSubAreaId', $id)->delete();
    }



    //Dr Voucher
    public function insertDrVoucherInformation($transactionId, $drTypeId, $expenseDate, $amount, $debitedTold, $creditedFromId, $expenseById, $approve_Status, $year, $monthId, $voucherNo, $creator)
    {
        return DrVoucher::insertGetId([
            'transactionId' => 0,
            'drTypeId' => $drTypeId,
            'expenseDate' => $expenseDate,
            'amount' => $amount,
            'debitedTold' => 0,
            'creditedFromId' => 0,
            'expenseById' => $expenseById,
            'approve_Status' => 0,
            'year' => $year,
            'monthId' => $monthId,
            'voucherNo' => $voucherNo,
            'creator' => $creator,
        ]);
    }

    public function getDrVoucherInformation($id)
    {
        if ($id == null) {
            return  $serviceArea = DrVoucher::all();
        } else {
            return  $serviceArea = DrVoucher::where('drVoucId', $id)->first();
        }
    }

    public function updateDrVoucherInformation($id, $transactionId, $drTypeId, $expenseDate, $amount, $debitedTold, $creditedFromId, $expenseById, $approve_Status, $year, $monthId, $voucherNo, $creator)
    {

        return DrVoucher::where('drVoucId', $id)->update([
            'transactionId' => 0,
            'drTypeId' => $drTypeId,
            'expenseDate' => $expenseDate,
            'amount' => $amount,
            'debitedTold' => 0,
            'creditedFromId' => 0,
            'expenseById' => $expenseById,
            'approve_Status' => 0,
            'year' => $year,
            'monthId' => $monthId,
            'voucherNo' => $voucherNo,
            'creator' => $creator,
        ]);
    }

    public function deleteDrVoucherInformation($id)
    {
        return DrVoucher::where('drVoucId', $id)->delete();
    }


    // Other Income
    public function insertOtherIncomeInformation($drTypeId, $amount, $date)
    {
        return OtherIncome::insertGetId([
            'drTypeId' => $drTypeId,
            'amount' => $amount,
            'date' => $date,
        ]);
    }

    public function getOtherIncomeInformation($id)
    {
        if ($id == null) {
            return OtherIncome::where('status', 1)->get();
        } else {
            return OtherIncome::where('otherIncomeId', $id)->first();
        }
    }

    public function updateOtherIncomeInformation($id, $drTypeId, $amount, $date)
    {
        return OtherIncome::where('otherIncomeId', $id)->update([
            'drTypeId' => $drTypeId,
            'amount' => $amount,
            'date' => $date,
        ]);
    }

    public function deleteOtherIncomeInformation($id)
    {
        return OtherIncome::where('otherIncomeId', $id)->update([
            'status' => 0
        ]);
    }



    //DrType
    public function getDrTypeInformation($id)
    {
        if ($id == null) {
            return  $drebitTypes = DrebitType::all();
        } else {
            return  $drebitTypes = DrebitType::where('id', $id)->first();
        }
    }

    // Product Purchase
    public function insertProductPurchaseInformation($total_bandwith, $facebook_bandwith, $youtube_bandwith, $others_bandwith, $total_amount, $purchaseForm_id, $month_id, $year, $paid_amount, $creator)
    {

        return $insert = ProductPurchase::insertGetId([
            'total_bandwith' => $total_bandwith,
            'facebook_bandwith' => $facebook_bandwith,
            'youtube_bandwith' => $youtube_bandwith,
            'others_bandwith' => $others_bandwith,
            'total_amount' => $total_amount,
            'purchaseForm_id' => $purchaseForm_id,
            'month_id' => $month_id,
            'year' => $year,
            'paid_amount' => $paid_amount,
            'creator' => $creator,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
    }

    public function getProductPurchaseInformation($id)
    {
        if ($id == null) {
            return  $banners = ProductPurchase::where('isActive', 1)->get();
        } else {
            return  $banners = ProductPurchase::where('productPurchase_id', $id)->where('isActive', 1)->first();
        }
    }

    public function updateProductPurchaseInformation($id, $total_bandwith, $facebook_bandwith, $youtube_bandwith, $others_bandwith, $total_amount, $purchaseForm_id, $month_id, $year, $paid_amount, $creator)
    {
        return $update = ProductPurchase::where('productPurchase_id', $id)->update([
            'total_bandwith' => $total_bandwith,
            'facebook_bandwith' => $facebook_bandwith,
            'youtube_bandwith' => $youtube_bandwith,
            'others_bandwith' => $others_bandwith,
            'total_amount' => $total_amount,
            'purchaseForm_id' => $purchaseForm_id,
            'month_id' => $month_id,
            'year' => $year,
            'paid_amount' => $paid_amount,
            'creator' => $creator,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
    }


    public function deleteProductPurchaseInformation($id)
    {
        return $update = ProductPurchase::where('productPurchase_id', $id)->update([
            'isActive' => 0,
        ]);
    }


    // Connection Status
    public function insertConnectionStatusInformation($connectionName)
    {
        return ConnectionStatus::insertGetId([
            'connectionName' => $connectionName,
        ]);
    }

    public function getConnectionStatusInformation($id)
    {
        if ($id == null) {
            return ConnectionStatus::where('status', 1)->get();
        } else {
            return ConnectionStatus::where('connectionStatusId', $id)->first();
        }
    }

    public function updateConnectionStatusInformation($id, $connectionName)
    {
        return ConnectionStatus::where('connectionStatusId', $id)->update([
            'connectionName' => $connectionName,
        ]);
    }

    public function deleteConnectionStatusInformation($id)
    {
        return ConnectionStatus::where('connectionStatusId', $id)->update([
            'status' => 0
        ]);
    }






    // Offer
    public function insertOfferInformation($title, $type, $url, $date, $remarks, $description)
    {
        return Offer::insertGetId([
            'title' => $title,
            'type' => $type,
            'url' => $url,
            'date' => $date,
            'remarks' => $remarks,
            'description' => $description,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
    }

    public function getOfferInformation($id)
    {
        if ($id == null) {
            return Offer::get();
        } else {
            return Offer::where('offer_id', $id)->first();
        }
    }

    public function updateOfferInformation($id, $title, $type, $url, $date, $remarks, $description)
    {
        return Offer::where('offer_id', $id)->update([
            'title' => $title,
            'type' => $type,
            'url' => $url,
            'date' => $date,
            'remarks' => $remarks,
            'description' => $description,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
    }

    public function activeOfferInformation($id)
    {
        return Offer::where('offer_id', $id)->update([
            'status' => 0
        ]);
    }

    public function inactiveOfferInformation($id)
    {
        return Offer::where('offer_id', $id)->update([
            'status' => 1
        ]);
    }

    public function deleteOfferInformation($id)
    {
        return Offer::where('offer_id', $id)->delete();
    }
}
