<?php

namespace App\Traits;

Trait AdminPermission{

    public function checkRequestPermission(){
        if (
            empty(auth()->user()->role->permission['permission']['companyprofile']['manage'])  && \Route::is('company_profile_form') ||
            empty(auth()->user()->role->permission['permission']['companyinformation']['manage'])  && \Route::is('company_profile_form') ||

            empty(auth()->user()->role->permission['permission']['banner']['manage'])  && \Route::is('banner_new_form') ||
            empty(auth()->user()->role->permission['permission']['banner']['edit'])  && \Route::is('banner_edit_form') ||
            empty(auth()->user()->role->permission['permission']['banner']['delete'])  && \Route::is('banner_delete_form')||

            empty(auth()->user()->role->permission['permission']['offerpublishwebsite']['publishoffer'])  && \Route::is('offer_active_form') ||
            empty(auth()->user()->role->permission['permission']['offerpublishwebsite']['manage'])  && \Route::is('offer_new_form') ||
            empty(auth()->user()->role->permission['permission']['offerpublishwebsite']['edit'])  && \Route::is('offer_edit_form')||
            empty(auth()->user()->role->permission['permission']['offerpublishwebsite']['delete'])  && \Route::is('offer_delete_form')||

            empty(auth()->user()->role->permission['permission']['division']['manage'])  && \Route::is('division_new_form') ||
            empty(auth()->user()->role->permission['permission']['division']['edit'])  && \Route::is('division_edit_form') ||
            empty(auth()->user()->role->permission['permission']['division']['delete'])  && \Route::is('division_delete_form')||

            empty(auth()->user()->role->permission['permission']['district']['manage'])  && \Route::is('district_new_form') ||
            empty(auth()->user()->role->permission['permission']['district']['edit'])  && \Route::is('district_edit_form') ||
            empty(auth()->user()->role->permission['permission']['district']['delete'])  && \Route::is('district_delete_form')||

            empty(auth()->user()->role->permission['permission']['upazila']['manage'])  && \Route::is('upazila_new_form') ||
            empty(auth()->user()->role->permission['permission']['upazila']['edit'])  && \Route::is('upazila_edit_form') ||
            empty(auth()->user()->role->permission['permission']['upazila']['delete'])  && \Route::is('upazila_delete_form')||

            empty(auth()->user()->role->permission['permission']['union']['manage'])  && \Route::is('union_new_form') ||
            empty(auth()->user()->role->permission['permission']['union']['edit'])  && \Route::is('union_edit_form') ||
            empty(auth()->user()->role->permission['permission']['union']['delete'])  && \Route::is('union_delete_form')||

            empty(auth()->user()->role->permission['permission']['addconnectionstatus']['manage'])  && \Route::is('connection_status_area_new_form') ||
            empty(auth()->user()->role->permission['permission']['addconnectionstatus']['edit'])  && \Route::is('connection_status_area_edit_form') ||
            empty(auth()->user()->role->permission['permission']['addconnectionstatus']['delete'])  && \Route::is('connection_status_area_delete_form')||

            empty(auth()->user()->role->permission['permission']['servicearea']['manage'])  && \Route::is('service_area_new_form') ||
            empty(auth()->user()->role->permission['permission']['servicearea']['edit'])  && \Route::is('service_area_edit_form') ||
            empty(auth()->user()->role->permission['permission']['servicearea']['delete'])  && \Route::is('service_area_delete_form')||

            empty(auth()->user()->role->permission['permission']['servicesubarea']['manage'])  && \Route::is('service_sub_area_new_form') ||
            empty(auth()->user()->role->permission['permission']['servicesubarea']['edit'])  && \Route::is('service_sub_area_edit_form') ||
            empty(auth()->user()->role->permission['permission']['servicesubarea']['delete'])  && \Route::is('service_sub_area_delete_form')||

            empty(auth()->user()->role->permission['permission']['popinformation']['manage'])  && \Route::is('pop_address_new_form') ||
            empty(auth()->user()->role->permission['permission']['popinformation']['edit'])  && \Route::is('pop_address_edit_form') ||
            empty(auth()->user()->role->permission['permission']['popinformation']['delete'])  && \Route::is('pop_address_delete_form')||

            empty(auth()->user()->role->permission['permission']['usermanagement']['manage'])  && \Route::is('user_new_form') ||
            empty(auth()->user()->role->permission['permission']['usermanagement']['edit'])  && \Route::is('user_edit_form') ||
            empty(auth()->user()->role->permission['permission']['usermanagement']['delete'])  && \Route::is('user_delete_form')||

            empty(auth()->user()->role->permission['permission']['rolemanagement']['manage'])  && \Route::is('role_new_form') ||
            empty(auth()->user()->role->permission['permission']['rolemanagement']['edit'])  && \Route::is('role_edit_form') ||
            empty(auth()->user()->role->permission['permission']['rolemanagement']['delete'])  && \Route::is('role_delete_form')||

            empty(auth()->user()->role->permission['permission']['permissionmanageuser']['manage'])  && \Route::is('permission_new_form') ||
            empty(auth()->user()->role->permission['permission']['permissionmanageuser']['edit'])  && \Route::is('permission_edit_form') ||
            empty(auth()->user()->role->permission['permission']['permissionmanageuser']['delete'])  && \Route::is('permission_delete_form')||

            empty(auth()->user()->role->permission['permission']['servicetype']['manage'])  && \Route::is('service_type_new_form') ||
            empty(auth()->user()->role->permission['permission']['servicetype']['edit'])  && \Route::is('service_type_edit_form') ||
            empty(auth()->user()->role->permission['permission']['servicetype']['delete'])  && \Route::is('service_type_delete_form')||

            empty(auth()->user()->role->permission['permission']['packageinformation']['manage'])  && \Route::is('package_info_new_form') ||
            empty(auth()->user()->role->permission['permission']['packageinformation']['edit'])  && \Route::is('package_info_edit_form') ||
            empty(auth()->user()->role->permission['permission']['packageinformation']['delete'])  && \Route::is('package_info_delete_form')||

            empty(auth()->user()->role->permission['permission']['addcustomer']['manage'])  && \Route::is('customer_new_form') ||
            empty(auth()->user()->role->permission['permission']['addcustomer']['edit'])  && \Route::is('customer_edit_form') ||
            empty(auth()->user()->role->permission['permission']['addcustomer']['delete'])  && \Route::is('customer_delete_form')||

            empty(auth()->user()->role->permission['permission']['newcustomerapproval']['manage'])  && \Route::is('connection_new_form') ||

            empty(auth()->user()->role->permission['permission']['customerstatusupdate']['manage'])  && \Route::is('customer_connect_desconnect_form')||
            
            empty(auth()->user()->role->permission['permission']['billgenerate']['manage'])  && \Route::is('bill_generate_form')||

            empty(auth()->user()->role->permission['permission']['billcollection']['manage'])  && \Route::is('payment_new_form') ||
            empty(auth()->user()->role->permission['permission']['billcollection']['edit'])  && \Route::is('payment_edit_form') ||
            empty(auth()->user()->role->permission['permission']['billcollection']['delete'])  && \Route::is('payment_delete_form')||

            empty(auth()->user()->role->permission['permission']['bandwithpurchase']['manage'])  && \Route::is('product_purchase_new_form') ||
            empty(auth()->user()->role->permission['permission']['bandwithpurchase']['edit'])  && \Route::is('product_purchase_edit_form') ||
            empty(auth()->user()->role->permission['permission']['bandwithpurchase']['delete'])  && \Route::is('product_purchase_delete_form')
        )
        {
           return response()->view('admin.dashboard.home');
        }
    }
}
