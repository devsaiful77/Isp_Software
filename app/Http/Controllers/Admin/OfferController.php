<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;

class OfferController extends Controller{
    public function addNewOfferForm(){
        $offers = (new CompanyInfoService())->getOfferInformation(null);
        return view('admin.offer.offer_add',compact('offers'));
    }

    public function editOfferInfoForm($id){
        $offer = (new CompanyInfoService())->getOfferInformation($id);
        return view('admin.offer.offer_edit',compact('offer'));
    }

    public function insertOfferInfoFormSubmit(Request $request){

        $this->validate($request, [
            'title' => 'required'
        ],[
            'title.required' => 'Please enter title!',
        ]);

        (new CompanyInfoService())->insertOfferInformation(
            $request['title'],
            $request['type'],
            $request['url'],
            $request['date'],
            $request['remarks'],
            $request['description'],
        );
        
        $notification=array(
            'messege'=>'Offer Save Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }

    public function updateOfferInfoFormSubmit(Request $request){
        $this->validate($request, [
            'title' => 'required'
        ],[
            'title.required' => 'Please enter title!',
        ]);

        // dd($request->all());
        (new CompanyInfoService())->updateOfferInformation(
            $request->offer_id,
            $request['title'],
            $request['type'],
            $request['url'],
            $request['date'],
            $request['remarks'],
            $request['description'],
        );

        $notification=array(
            'messege'=>'Offer Update Success!',
            'alert-type'=>'success',
        );
        return redirect()->route('offer_new_form')->with($notification);
    
    }

    public function activeOfferInfoFormSubmit($id){
        (new CompanyInfoService())->activeOfferInformation($id);

        $notification=array(
            'messege'=>'Offer Active Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }

    public function inactiveOfferInfoFormSubmit($id){
        (new CompanyInfoService())->inactiveOfferInformation($id);

        $notification=array(
            'messege'=>'Offer Inactive Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }

    public function deleteOfferInfoFormSubmit(Request $request){
        $id = $request['modal_id'];
        (new CompanyInfoService())->deleteOfferInformation($id);

        $notification=array(
            'messege'=>'Offer Delete Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }
}
