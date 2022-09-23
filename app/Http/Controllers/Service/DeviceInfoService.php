<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Debit;
use App\Models\Credit;
use App\Models\AccountsHead;
use App\Models\Brand;
use App\Models\Category;
use App\Models\DrVoucher;
use App\Models\PurchaseRecord;
use App\Models\quotationDeviceRecord;
use App\Models\Size;
use Carbon\Carbon;
use DateTime;
use SebastianBergmann\LinesOfCode\Counter;
use Session;

class DeviceInfoService extends Controller
{
    // Device Category
    public function getDeviceCategoryAll()
    {
        return $allCate = Category::where('CateStatus', true)->orderBy('CateId', 'DESC')->get();
    }


    // Device Sub Category
    public function getDeviceBrandAll($CategoryID)
    {
        if ($CategoryID == null || $CategoryID == 0) {
            return Brand::get();
        }
        return Brand::where('CateId', $CategoryID)->get();
    }


    // Device Brand

    public function getDeviceBrandsOnly()
    {
        return $allSize = Size::where('SizeStatus', true)->orderBy('SizeId', 'DESC')->get();
    }

    public function deleteADeviceBrand($id)
    {
        return Size::where('SizeId', $id)->delete();
    }

    public function getDeviceAllBrandWithCategoryAndSubCategory()
    {
        return  Size::where('SizeStatus', true)->orderBy('categories.CateId', 'ASC')
            ->join('categories', 'sizes.CateId', '=', 'categories.CateId')
            ->leftjoin('brands', 'sizes.BranId', '=', 'brands.BranId')
            ->get();
    }

    public function addCustomerQuotationDeviceRecords($deviceRecord, $cusQuotationId)
    {

        foreach ($deviceRecord as $data) {
            quotationDeviceRecord::insert([
                'Quantity' => $data->qty,
                'UnitPrice' => $data->price,
                'Amount' => $data->subtotal,
                'cusQuotationId' => $cusQuotationId,
                'CateId' => $data->options->CategoryId,
                'BranId' => $data->options->BranId,
                'SizeId' => $data->options->Size,
                //'remarks' => $data->remarks ?? "",
            ]);
        }
    }

    public function getAllDeviceInventory()
    {

        $allDeviceBrand = $this->getDeviceAllBrandWithCategoryAndSubCategory();
        $counter = 0;
        foreach ($allDeviceBrand as $adevice) {
            $totalQty = PurchaseRecord::where('purchase_records.CateId', $adevice->CateId)
                ->where('purchase_records.BranId', $adevice->BranId)
                ->where('purchase_records.SizeId', $adevice->SizeId)
                ->sum('Quantity');
            $adevice->totalQty  = $totalQty;
            $allDeviceBrand[$counter++] = $adevice;
        }

        // dd($allDeviceBrand);
        return $allDeviceBrand;
    }
}
