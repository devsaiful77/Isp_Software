<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerInfoController;
use App\Http\Controllers\Admin\CompanyInfoController;
use App\Http\Controllers\Admin\ServiceTypeController;
use App\Http\Controllers\Admin\PackageInfoController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\UpazilaController;
use App\Http\Controllers\Admin\UnionController;
use App\Http\Controllers\Admin\ConnectionInfoController;
use App\Http\Controllers\Admin\ServiceAreaController;
use App\Http\Controllers\Admin\ServiceSubAreaController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\DrVoucherController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\BandwithPurchaseController;
use App\Http\Controllers\Admin\ConnectionStatusController;
use App\Http\Controllers\Admin\PopAddressController;
use App\Http\Controllers\Admin\DebitController;
use App\Http\Controllers\Admin\CreditController;
use App\Http\Controllers\Admin\AccountsHeadController;
use App\Http\Controllers\Admin\OtherIncomeController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\PermissionController;
use App\Http\Controllers\Website\WebsiteController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ThicknessController;
use App\Http\Controllers\Admin\ProductPurchaseController;
use App\Http\Controllers\Admin\CustomerQuotationController;
use App\Http\Controllers\Admin\ComplainInfoController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// login user name : ciss@gmail.com
// password : 11111111


Route::get('/', function () {

    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    // \Artisan::call('dump-autoload');
    return "cleared";
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'permission']], function () {

    // Admin Routes
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    //User
    Route::get('user/new-user-form', [UserController::class, 'addNewUserForm'])->name('user_new_form');
    Route::post('user/insert-new-user', [UserController::class, 'insertUserInfoFormSubmit'])->name('user_insert_form');
    Route::get('user/edit-user/{id}', [UserController::class, 'editUserInfoForm'])->name('user_edit_form');
    Route::post('user/update-user', [UserController::class, 'updateUserInfoFormSubmit'])->name('user_update_form');
    Route::post('user/delete-user', [UserController::class, 'deleteUserInformationFormSubmit'])->name('user_delete_form');

    // Banner
    Route::get('banner/new-banner-form', [BannerInfoController::class, 'addNewBannerForm'])->name('banner_new_form');
    Route::post('banner/insert-new-banner', [BannerInfoController::class, 'insertBannerInfoFormSubmit'])->name('banner_insert_form');
    Route::get('banner/edit-banner/{id}', [BannerInfoController::class, 'editBannerInfoForm'])->name('banner_edit_form');
    Route::post('banner/update-banner', [BannerInfoController::class, 'updateBannerInfoFormSubmit'])->name('banner_update_form');
    Route::post('banner/delete-banner', [BannerInfoController::class, 'deleteBannerInformationFormSubmit'])->name('banner_delete_form');

    // Company Profile
    Route::get('company/profile-form', [CompanyInfoController::class, 'CompanyProfileInfoForm'])->name('company_profile_form');
    Route::post('company/update-profile', [CompanyInfoController::class, 'updateCompanyProfileInfoFormSubmit'])->name('company_profile_update_form');

    // Service Type
    Route::get('serviceType/new-service-type-form', [ServiceTypeController::class, 'addNewServiceTypeForm'])->name('service_type_new_form');
    Route::post('serviceType/insert-new-service-type', [ServiceTypeController::class, 'insertServiceTypeInfoFormSubmit'])->name('service_type_insert_form');
    Route::get('serviceType/edit-service-type/{id}', [ServiceTypeController::class, 'editServiceTypeInfoForm'])->name('service_type_edit_form');
    Route::post('serviceType/update-service-type', [ServiceTypeController::class, 'updateServiceTypeInfoFormSubmit'])->name('service_type_update_form');
    Route::post('serviceType/delete-service-type', [ServiceTypeController::class, 'deleteServiceTypeInfoFormSubmit'])->name('service_type_delete_form');

    // Package Info
    Route::get('packageInfo/new-package-info-form', [PackageInfoController::class, 'addNewPackageInfoForm'])->name('package_info_new_form');
    Route::post('packageInfo/insert-new-package-info', [PackageInfoController::class, 'insertPackageInfoFormSubmit'])->name('package_info_insert_form');
    Route::get('packageInfo/edit-package-info/{id}', [PackageInfoController::class, 'editPackageInfoForm'])->name('package_info_edit_form');
    Route::post('packageInfo/update-package-info', [PackageInfoController::class, 'updatePackageInfoFormSubmit'])->name('package_info_update_form');
    Route::post('packageInfo/delete-package-info', [PackageInfoController::class, 'deletePackageInfoFormSubmit'])->name('package_info_delete_form');

    // Division
    Route::get('division/new-division-form', [DivisionController::class, 'addNewDivisionForm'])->name('division_new_form');
    Route::post('division/insert-new-division', [DivisionController::class, 'insertDivisionInfoFormSubmit'])->name('division_insert_form');
    Route::get('division/edit-division/{id}', [DivisionController::class, 'editDivisionInfoForm'])->name('division_edit_form');
    Route::post('division/update-division', [DivisionController::class, 'updateDivisionInfoFormSubmit'])->name('division_update_form');
    Route::post('division/delete-division', [DivisionController::class, 'deleteDivisionInfoFormSubmit'])->name('division_delete_form');

    // District
    Route::get('district/new-district-form', [DistrictController::class, 'addNewDistrictForm'])->name('district_new_form');
    Route::post('district/insert-new-district', [DistrictController::class, 'insertDistrictInfoFormSubmit'])->name('district_insert_form');
    Route::get('district/edit-district/{id}', [DistrictController::class, 'editDistrictInfoForm'])->name('district_edit_form');
    Route::post('district/update-district', [DistrictController::class, 'updateDistrictInfoFormSubmit'])->name('district_update_form');
    Route::post('district/delete-district', [DistrictController::class, 'deleteDistrictInfoFormSubmit'])->name('district_delete_form');

    // Upazila
    Route::get('upazila/new-upazila-form', [UpazilaController::class, 'addNewUpazilaForm'])->name('upazila_new_form');
    Route::post('upazila/insert-new-upazila', [UpazilaController::class, 'insertUpazilaInfoFormSubmit'])->name('upazila_insert_form');
    Route::get('upazila/edit-upazila/{id}', [UpazilaController::class, 'editUpazilaInfoForm'])->name('upazila_edit_form');
    Route::post('upazila/update-upazila', [UpazilaController::class, 'updateUpazilaInfoFormSubmit'])->name('upazila_update_form');
    Route::post('upazila/delete-upazila', [UpazilaController::class, 'deleteUpazilaInfoFormSubmit'])->name('upazila_delete_form');

    // Union
    Route::get('union/new-union-form', [UnionController::class, 'addNewUnionForm'])->name('union_new_form');
    Route::post('union/insert-new-union', [UnionController::class, 'insertUnionInfoFormSubmit'])->name('union_insert_form');
    Route::get('union/edit-union/{id}', [UnionController::class, 'editUnionInfoForm'])->name('union_edit_form');
    Route::post('union/update-union', [UnionController::class, 'updateUnionInfoFormSubmit'])->name('union_update_form');
    Route::post('union/delete-union', [UnionController::class, 'deleteUnionInfoFormSubmit'])->name('union_delete_form');

    // Pop Addres
    Route::get('pop/address/new-pop-address-form', [PopAddressController::class, 'addNewPopAddressForm'])->name('pop_address_new_form');
    Route::post('pop/address/insert-new-pop-address', [PopAddressController::class, 'insertPopAddressInfoFormSubmit'])->name('pop_address_insert_form');
    Route::get('pop/address/edit-pop-address/{id}', [PopAddressController::class, 'editPopAddressInfoForm'])->name('pop_address_edit_form');
    Route::post('pop/address/update-pop-address', [PopAddressController::class, 'updatePopAddressInfoFormSubmit'])->name('pop_address_update_form');
    Route::post('pop/address/delete-pop-address', [PopAddressController::class, 'deletePopAddressInfoFormSubmit'])->name('pop_address_delete_form');

    // Connection Info
    Route::get('connection/new-connection-form', [ConnectionInfoController::class, 'addNewConnectionForm'])->name('connection_new_form');
    Route::post('connection/insert-new-connection', [ConnectionInfoController::class, 'insertConnectionInfoFormSubmit'])->name('connection_insert_form');
    Route::get('connection/edit-connection/{id}', [ConnectionInfoController::class, 'editConnectionInfoForm'])->name('connection_edit_form');
    Route::post('connection/update-connection', [ConnectionInfoController::class, 'updateConnectionInfoFormSubmit'])->name('connection_update_form');
    Route::post('connection/delete-connection', [ConnectionInfoController::class, 'deleteConnectionInfoFormSubmit'])->name('connection_delete_form');
    Route::post('connection/update-connection-status', [ConnectionInfoController::class, 'updateCustomerConnectionStatus'])->name('update_customer_connection_status');

    // Service Area
    Route::get('serviceArea/new-service-area-form', [ServiceAreaController::class, 'addNewServiceAreaForm'])->name('service_area_new_form');
    Route::post('serviceArea/insert-new-service-area', [ServiceAreaController::class, 'insertServiceAreaInfoFormSubmit'])->name('service_area_insert_form');
    Route::get('serviceArea/edit-service-area/{id}', [ServiceAreaController::class, 'editServiceAreaInfoForm'])->name('service_area_edit_form');
    Route::post('serviceArea/update-service-area', [ServiceAreaController::class, 'updateServiceAreaInfoFormSubmit'])->name('service_area_update_form');
    Route::post('serviceArea/delete-service-area', [ServiceAreaController::class, 'deleteServiceAreaInfoFormSubmit'])->name('service_area_delete_form');

    // Service Sub Area
    Route::get('serviceSubArea/new-service-sub-area-form', [ServiceSubAreaController::class, 'addNewServiceSubAreaForm'])->name('service_sub_area_new_form');
    Route::post('serviceSubArea/insert-new-service-sub-area', [ServiceSubAreaController::class, 'insertServiceSubAreaInfoFormSubmit'])->name('service_sub_area_insert_form');
    Route::get('serviceSubArea/edit-service-sub-area/{id}', [ServiceSubAreaController::class, 'editServiceSubAreaInfoForm'])->name('service_sub_area_edit_form');
    Route::post('serviceSubArea/update-service-sub-area', [ServiceSubAreaController::class, 'updateServiceSubAreaInfoFormSubmit'])->name('service_sub_area_update_form');
    Route::post('serviceSubArea/delete-service-sub-area', [ServiceSubAreaController::class, 'deleteServiceSubAreaInfoFormSubmit'])->name('service_sub_area_delete_form');


    /* ++++++++++++ CUSTOMER QUOTATION  ++++++++++++ */
    Route::get('customer/quotation/add', [CustomerQuotationController::class, 'customerQuotationForm'])->name('customer.quotation.initial.add');
    Route::post('customer/quotation/add-quotation', [CustomerQuotationController::class, 'customerQuotationFormSubmit'])->name('customer.quotation.submit');
    Route::get('customer/quotation/edit-quotation/{id}', [CustomerQuotationController::class, 'customerQuotationEdit'])->name('customer.quotation.edit');
    Route::post('customer/quotation/edit-quotation-submitted', [CustomerQuotationController::class, 'customerQuotationUpdateFormSubmit'])->name('customer.quotation.edit-submitted');

    /* ++++++++++++ CUSTOMER COMPLAIN  ++++++++++++ */

    Route::get('customer/complain/add', [ComplainInfoController::class, 'customerNewComplainForm'])->name('customer.complain.add.new.complain');


    /* ++++++++++++ CUSTOMER Operation  ++++++++++++ */
    Route::get('customer/new-customer-form', [CustomerController::class, 'addNewCustomerForm'])->name('customer_new_form');
    Route::post('customer/insert-new-customer', [CustomerController::class, 'insertCustomerInfoFormSubmit'])->name('customer_insert_form');
    Route::get('customer/edit-customer/{id}', [CustomerController::class, 'editCustomerInfoForm'])->name('customer_edit_form');
    Route::post('customer/update-customer', [CustomerController::class, 'updateCustomerInfoFormSubmit'])->name('customer_update_form');
    Route::post('customer/delete-customer', [CustomerController::class, 'deleteCustomerInfoFormSubmit'])->name('customer_delete_form');
    Route::post('customer/search-customer', [CustomerController::class, 'searchCustomerInformation'])->name('search_customer_information');
    Route::post('customer/connection/status/update', [CustomerController::class, 'connectionStatusUpdate'])->name('connection_status_update');

    // Excel CSV Customer
    Route::get('/customer/export-excel', [CustomerController::class, 'customerExcel'])->name('customer_excel');
    Route::get('/customer/export-csv', [CustomerController::class, 'customerIntoCSV'])->name('customer_csv');

    // Customer Connect Desconnect
    Route::get('customer/connect-desconnect-form', [CustomerController::class, 'customerConnectDesconnectForm'])->name('customer_connect_desconnect_form');
    Route::post('customer/update-connect-desconnect', [CustomerController::class, 'updateCustomerConnectDesconnectFormSubmit'])->name('customer_connect_desconnect_update_form');




    // Payment
    Route::get('payment/new-payment-form', [BillController::class, 'addNewPaymentForm'])->name('payment_new_form');
    Route::post('payment/insert-new-payment', [BillController::class, 'insertPaymentInfoFormSubmit'])->name('payment_insert_form');
    Route::get('payment/edit-payment/{id}', [BillController::class, 'editPaymentInfoForm'])->name('payment_edit_form');
    Route::post('payment/update-payment', [BillController::class, 'updatePaymentInfoFormSubmit'])->name('payment_update_form');
    Route::post('payment/delete-payment', [BillController::class, 'deletePaymentInfoFormSubmit'])->name('payment_delete_form');

    //BillGenerate
    Route::get('bill/generate/bill-generate-form', [BillController::class, 'billGenerateForm'])->name('bill_generate_form');
    Route::post('customer/bill-generate', [BillController::class, 'customerBillGenerateFormSubmit'])->name('customer_bill_generate');

    // Bill Search
    Route::get('customer/bill-search-form', [BillController::class, 'customerBillSearchForm'])->name('customer_bill_search_form');
    Route::post('customer/bill-search', [BillController::class, 'customerBillSearchFormSubmit'])->name('customer_bill_search');
    Route::post('customer/bill-pay', [BillController::class, 'customerBillPayFormSubmit'])->name('customer_bill_pay');

    // DrVoucher
    Route::get('drVoucher/new-drVoucher-form', [DrVoucherController::class, 'addNewDrVoucherForm'])->name('dr_voucher_new_form');
    Route::post('drVoucher/insert-new-drVoucher', [DrVoucherController::class, 'insertDrVoucherInfoFormSubmit'])->name('dr_voucher_insert_form');
    Route::get('drVoucher/edit-drVoucher/{id}', [DrVoucherController::class, 'editDrVoucherInfoForm'])->name('dr_voucher_edit_form');
    Route::post('drVoucher/update-drVoucher', [DrVoucherController::class, 'updateDrVoucherInfoFormSubmit'])->name('dr_voucher_update_form');
    Route::post('drVoucher/delete-drVoucher', [DrVoucherController::class, 'deleteDrVoucherInfoFormSubmit'])->name('dr_voucher_delete_form');

    // Other Income
    Route::get('other/income/new-other-income-form', [OtherIncomeController::class, 'addNewOtherIncomeForm'])->name('other_income_new_form');
    Route::post('other/income/insert-new-other-income', [OtherIncomeController::class, 'insertOtherIncomeInfoFormSubmit'])->name('other_income_insert_form');
    Route::get('other/income/edit-other-income/{id}', [OtherIncomeController::class, 'editOtherIncomeInfoForm'])->name('other_income_edit_form');
    Route::post('other/income/update-other-income', [OtherIncomeController::class, 'updateOtherIncomeInfoFormSubmit'])->name('other_income_update_form');
    Route::post('other/income/delete-other-income', [OtherIncomeController::class, 'deleteOtherIncomeInfoFormSubmit'])->name('other_income_delete_form');

    // ProductPurchase
    Route::get('productPurchase/new-product-purchase-form', [BandwithPurchaseController::class, 'addNewProductPurchaseForm'])->name('product_purchase_new_form');
    Route::post('ProductPurchase/insert-new-product-purchase', [BandwithPurchaseController::class, 'insertProductPurchaseInfoFormSubmit'])->name('product_purchase_insert_form');
    Route::get('productPurchase/edit-product-purchase/{id}', [BandwithPurchaseController::class, 'editProductPurchaseInfoForm'])->name('product_purchase_edit_form');
    Route::post('productPurchase/update-product-purchase', [BandwithPurchaseController::class, 'updateProductPurchaseInfoFormSubmit'])->name('product_purchase_update_form');
    Route::post('productPurchase/delete-product-purchase', [BandwithPurchaseController::class, 'deleteProductPurchaseInfoFormSubmit'])->name('product_purchase_delete_form');

    // Report Collection
    Route::get('report/report-payment-form', [ReportController::class, 'reportPaymentForm'])->name('report_payment_form');
    Route::post('report/report-payment-search-by-date', [ReportController::class, 'reportPaymentSearchByDate'])->name('report_payment_search_by_date');
    Route::post('report/report-payment-search-by-month', [ReportController::class, 'reportPaymentSearchByMonth'])->name('report_payment_search_by_month');
    Route::post('report/report-payment-search-by-year', [ReportController::class, 'reportPaymentSearchByYear'])->name('report_payment_search_by_year');

    // Connection Status
    Route::get('connectionStatus/new-connection-status-area-form', [ConnectionStatusController::class, 'addNewConnectionStatusForm'])->name('connection_status_area_new_form');
    Route::post('connectionStatus/insert-new-connection-status-area', [ConnectionStatusController::class, 'insertConnectionStatusInfoFormSubmit'])->name('connection_status_area_insert_form');
    Route::get('connectionStatus/edit-connection-status-area/{id}', [ConnectionStatusController::class, 'editConnectionStatusInfoForm'])->name('connection_status_area_edit_form');
    Route::post('connectionStatus/update-connection-status-area', [ConnectionStatusController::class, 'updateConnectionStatusInfoFormSubmit'])->name('connection_status_area_update_form');
    Route::post('connectionStatus/delete-connection-status-area', [ConnectionStatusController::class, 'deleteConnectionStatusInfoFormSubmit'])->name('connection_status_area_delete_form');


    // Report Customer List
    Route::get('report/report-customer-form', [CustomerController::class, 'reportCustomerForm'])->name('report_customer_form');
    Route::post('report/report-customer-list', [CustomerController::class, 'customerReportFormSubmit'])->name('customer_report_form_submit');
    Route::post('report/report-new-customer-list', [CustomerController::class, 'customerReportNewCustomerFormSubmit'])->name('customer_report_new_customer_form_submit');

    // Report Dr Voucher
    Route::get('report/report-daily-cost-form', [DrVoucherController::class, 'reportDailyCostForm'])->name('report_daily_cost_form');
    Route::post('report/report-daily-cost-search', [DrVoucherController::class, 'reportDailyCostSearch'])->name('report_daily_cost_search');

    // Report IIG Payment
    Route::get('report/report-Iig-paymeny-form', [BillController::class, 'reportIigPaymentForm'])->name('report_iig_payment_form');
    Route::post('report/report-Iig-paymeny-search', [BillController::class, 'reportIigPaymentSearch'])->name('report_iig_payment_search');


    // Day Closing Report
    Route::get('admin/report/day-closing-report-form', [BillController::class, 'loadDayClosingReportForm'])->name('day_closing_report_form');
    Route::post('admin/report/day-closing-report-process', [BillController::class, 'loadDayClosingReportProcess'])->name('day_closing_report_process');
    Route::post('admin/report/day-closing-report-process', [BillController::class, 'dayClosingReportDetails'])->name('day_closing_report_process');


    // Debit
    Route::get('debit/new-debit-form', [DebitController::class, 'addNewDebitForm'])->name('debit_new_form');
    Route::post('debit/insert-new-debit', [DebitController::class, 'insertDebitInfoFormSubmit'])->name('debit_insert_form');
    Route::get('debit/edit-debit/{id}', [DebitController::class, 'editDebitInfoForm'])->name('debit_edit_form');
    Route::post('debit/update-debit', [DebitController::class, 'updateDebitInfoFormSubmit'])->name('debit_update_form');
    Route::post('debit/delete-debit', [DebitController::class, 'deleteDebitInfoFormSubmit'])->name('debit_delete_form');

    // Credit
    Route::get('credit/new-credit-form', [CreditController::class, 'addNewCreditForm'])->name('credit_new_form');
    Route::post('credit/insert-new-credit', [CreditController::class, 'insertCreditInfoFormSubmit'])->name('credit_insert_form');
    Route::get('credit/edit-credit/{id}', [CreditController::class, 'editCreditInfoForm'])->name('credit_edit_form');
    Route::post('credit/update-credit', [CreditController::class, 'updateCreditInfoFormSubmit'])->name('credit_update_form');
    Route::post('credit/delete-credit', [CreditController::class, 'deleteCreditInfoFormSubmit'])->name('credit_delete_form');

    // Accounts Head
    Route::get('accounts/head/new-accounts-head-form', [AccountsHeadController::class, 'addNewAccountsHeadForm'])->name('accounts_head_new_form');
    Route::post('accounts/head/insert-new-accounts-head', [AccountsHeadController::class, 'insertAccountsHeadInfoFormSubmit'])->name('accounts_head_insert_form');
    Route::get('accounts/head/edit-accounts-head/{id}', [AccountsHeadController::class, 'editAccountsHeadInfoForm'])->name('accounts_head_edit_form');
    Route::post('accounts/head/update-accounts-head', [AccountsHeadController::class, 'updateAccountsHeadInfoFormSubmit'])->name('accounts_head_update_form');
    Route::post('accounts/head/delete-accounts-head', [AccountsHeadController::class, 'deleteAccountsHeadInfoFormSubmit'])->name('accounts_head_delete_form');

    // Offer
    Route::get('offer/new-offer-form', [OfferController::class, 'addNewOfferForm'])->name('offer_new_form');
    Route::post('offer/insert-new-offer', [OfferController::class, 'insertOfferInfoFormSubmit'])->name('offer_insert_form');
    Route::get('offer/edit-offer/{id}', [OfferController::class, 'editOfferInfoForm'])->name('offer_edit_form');
    Route::post('offer/update-offer', [OfferController::class, 'updateOfferInfoFormSubmit'])->name('offer_update_form');
    Route::get('offer/active-offer/{id}', [OfferController::class, 'activeOfferInfoFormSubmit'])->name('offer_active_form');
    Route::get('offer/inactive-offer/{id}', [OfferController::class, 'inactiveOfferInfoFormSubmit'])->name('offer_inactive_form');
    Route::post('offer/delete-offer', [OfferController::class, 'deleteOfferInfoFormSubmit'])->name('offer_delete_form');

    // Role Management
    Route::get('role/new-role-form', [RoleController::class, 'addNewRoleForm'])->name('role_new_form');
    Route::post('role/insert-new-role', [RoleController::class, 'insertRoleInfoFormSubmit'])->name('role_insert_form');
    Route::get('role/edit-role/{id}', [RoleController::class, 'editRoleInfoForm'])->name('role_edit_form');
    Route::post('role/update-role', [RoleController::class, 'updateRoleInfoFormSubmit'])->name('role_update_form');
    Route::post('role/delete-role', [RoleController::class, 'deleteRoleInfoFormSubmit'])->name('role_delete_form');

    // Permission Management
    Route::get('permission/new-permission-form', [PermissionController::class, 'addNewPermissionForm'])->name('permission_new_form');
    Route::post('permission/insert-new-permission', [PermissionController::class, 'insertPermissionInfoFormSubmit'])->name('permission_insert_form');
    Route::get('permission/edit-permission/{id}', [PermissionController::class, 'editPermissionInfoForm'])->name('permission_edit_form');
    Route::post('permission/update-permission', [PermissionController::class, 'updatePermissionInfoFormSubmit'])->name('permission_update_form');
    Route::post('permission/delete-permission', [PermissionController::class, 'deletePermissionInfoFormSubmit'])->name('permission_delete_form');
    // });


    // Material Items Details Section

    Route::get('category/add', [CategoryController::class, 'add'])->name('category.add');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::post('category/add', [CategoryController::class, 'store'])->name('category.store');
    Route::post('category/edit', [CategoryController::class, 'update'])->name('category.update');

    Route::get('brand/add', [BrandController::class, 'add'])->name('brand.add');
    Route::get('brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::get('brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
    Route::post('brand/add', [BrandController::class, 'store'])->name('brand.store');
    Route::post('brand/edit', [BrandController::class, 'update'])->name('brand.update');
    // ajax route
    Route::post('category-wise-brand', [BrandController::class, 'categoryWiseBrand'])->name('Category-wise-Brand');
    // ajax route

    Route::get('size/add', [SizeController::class, 'add'])->name('size.add');
    Route::get('size/edit/{id}', [SizeController::class, 'edit'])->name('size.edit');
    Route::get('size/delete/{id}', [SizeController::class, 'delete'])->name('size.delete');
    Route::post('size/add', [SizeController::class, 'store'])->name('size.store');
    Route::post('size/edit', [SizeController::class, 'update'])->name('size.update');
    // ajax route
    Route::post('brand-wise-size', [SizeController::class, 'brandWiseSize'])->name('Brand-wise-size');
    // ajax route

    Route::get('thickness/add', [ThicknessController::class, 'add'])->name('thickness.add');
    Route::get('thickness/edit/{id}', [ThicknessController::class, 'edit'])->name('thickness.edit');
    Route::get('thickness/delete/{id}', [ThicknessController::class, 'delete'])->name('thickness.delete');
    Route::post('thickness/add', [ThicknessController::class, 'store'])->name('thickness.store');
    Route::post('thickness/edit', [ThicknessController::class, 'update'])->name('thickness.update');
    // ajax route
    Route::post('size-wise-thickness', [ThicknessController::class, 'sizeWiseThickness'])->name('size-wise-thickness');
    // ajax route


    Route::get('product/purchase/add', [ProductPurchaseController::class, 'devicePurchaseForm'])->name('product.purchase.add');
    Route::get('product/purchase/edit/{id}', [ProductPurchaseController::class, 'edit'])->name('product.purchase.edit');
    Route::post('product/purchase/add', [ProductPurchaseController::class, 'store'])->name('product.purchase.store');
    Route::post('product/purchase/edit', [ProductPurchaseController::class, 'update'])->name('product.purchase.update');
    Route::get('product/purchase/device-list', [ProductPurchaseController::class, 'getDeviceInventory'])->name('product-invendory');



    /* ++++++++++++ Ajax Route IN Add To Cart ++++++++++++ */
    Route::post('product/purchase/add-to-cart', [ProductPurchaseController::class, 'productAddToCart'])->name('product-purchase.addToCart');
    Route::get('product/purchase/order-list', [ProductPurchaseController::class, 'getOrderList'])->name('product-purchase-listIn.addToCart');
    Route::post('product/purchase/qunatity-increment', [ProductPurchaseController::class, 'QunatityIncrement'])->name('QunatityIncrement');
    Route::post('product/purchase/qunatity-decrement', [ProductPurchaseController::class, 'QunatityDecrement'])->name('QunatityDecrement');
    Route::post('product/purchase/remove', [ProductPurchaseController::class, 'productRemoveToCart'])->name('remove-cart');
    /* ++++++++++++ Ajax Route IN Add To Cart ++++++++++++ */
});






// ================= Website Routes ======================
// Website Route Start
Route::get('/', [WebsiteController::class, 'index'])->name('website');
Route::get('/website/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/website/service', [WebsiteController::class, 'service'])->name('service');
Route::get('/website/package', [WebsiteController::class, 'package'])->name('package');
Route::get('/website/contact', [WebsiteController::class, 'contact'])->name('contact');









require __DIR__ . '/auth.php';
