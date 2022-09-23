<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Service\CompanyInfoService;
use App\Http\Controllers\Service\CustomerPaymentInfoService;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class BandwithPurchaseController extends Controller
{

    public function addNewProductPurchaseForm()
    {
        $months = (new CompanyInfoService())->getMonths(null);
        $productPurchases = (new CompanyInfoService())->getProductPurchaseInformation(null);
        return view('admin.product-purchase.product_purchase_add', compact('productPurchases', 'months'));
    }

    public function editProductPurchaseInfoForm($id)
    {
        $years = (new CompanyInfoService())->getProductPurchaseInformation(null);
        $months = (new CustomerPaymentInfoService())->getMonthInformation(null);
        $productPurchase = (new CompanyInfoService())->getProductPurchaseInformation($id);

        return view('admin.product-purchase.product_purchase_edit', compact('productPurchase', 'months', 'years'));
    }



    public function insertProductPurchaseInfoFormSubmit(Request $request)
    {


        $this->validate($request, [
            'total_bandwith' => 'required',
        ], [
            'total_bandwith.required' => 'Please enter total bandwith!',
        ]);

        $creator = Auth::user()->id;

        (new CompanyInfoService())
            ->insertProductPurchaseInformation(
                $request['total_bandwith'],
                $request['facebook_bandwith'],
                $request['youtube_bandwith'],
                $request['others_bandwith'],
                $request['total_amount'],
                $request['purchaseForm_id'],
                $request['month_id'],
                $request['year'],
                $request['paid_amount'],
                $creator,
            );

        $notification = array(
            'messege' => 'Product Purchase Save Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('product_purchase_new_form')->with($notification);
    }

    public function updateProductPurchaseInfoFormSubmit(Request $request)
    {

        // dd($request->all());
        $creator = Auth::user()->id;

        (new CompanyInfoService())->updateProductPurchaseInformation(
            $request->productPurchase_id,
            $request['total_bandwith'],
            $request['facebook_bandwith'],
            $request['youtube_bandwith'],
            $request['others_bandwith'],
            $request['total_amount'],
            $request['purchaseForm_id'],
            $request['month_id'],
            $request['year'],
            $request['paid_amount'],
            $creator,
        );

        $notification = array(
            'messege' => 'Product Purchase Update Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('product_purchase_new_form')->with($notification);
    }

    public function deleteProductPurchaseInfoFormSubmit(Request $request)
    {
        $id = $request['modal_id'];
        (new CompanyInfoService())->deleteProductPurchaseInformation($id);

        $notification = array(
            'messege' => 'Product Purchase Delete Success!',
            'alert-type' => 'success',
        );
        return redirect()->route('product_purchase_new_form')->with($notification);
    }
}
