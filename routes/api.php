<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\CompanyInfoController;
use App\Http\Controllers\Admin\BannerInfoController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\ServiceTypeController;
use App\Http\Controllers\Admin\UpazilaController;
use App\Http\Controllers\Admin\UnionController;
use App\Http\Controllers\Admin\PackageInfoController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ConnectionInfoController;
use App\Http\Controllers\Admin\ConnectionStatusController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::group(['middleware' => 'api'], function () {
});



Route::get('/get-companyinfo/{id?}', [CompanyInfoController::class, 'getCompanyProfileInformation']);

Route::get('/get-banners/{id?}', [BannerInfoController::class, 'getWebsiteBannerInfo']);

// User Information
Route::get('/new-user', [UserController::class, 'saveUserInfo']);
Route::get('/get-users/{id?}', [UserController::class, 'getUserInfo']);

// Company Information


// Company Banner
Route::get('/new-banner', [BannerInfoController::class, 'saveWebsiteBannerInfo']);



// Service Type Information
Route::get('/get-services/{id?}', [ServiceTypeController::class, 'getServices']);


// DiviSion District, Upzilla
Route::get('/get-divisions/{id?}', [DivisionController::class, 'getDivisions']);
Route::get('/get-districts/{id?}', [DistrictController::class, 'getDistrictInfo']);
Route::get('/get-districts-by-divisionid/{id?}', [DistrictController::class, 'getDistrictListbyDivisionId']);

Route::post('/save-district', [DistrictController::class, 'saveDistrictInfo']);

Route::get('/get-upazilas/{id?}', [UpazilaController::class, 'getUpazilaInfo']);
Route::get('/get-upazilalist-by-district/{id?}', [UpazilaController::class, 'getUpazilaListByDistrictId']);
Route::post('/save-upazila', [UpazilaController::class, 'saveUpazilaInfo']);

Route::get('/get-unionlist-by-upazilla/{id?}', [UnionController::class, 'getUnionListByUpazilla']);


// Package
Route::get('/get-packages/{id?}', [PackageInfoController::class, 'getPackageInfo']);
Route::post('/save-package', [PackageInfoController::class, 'savePackageInfo']);


// Designation info
Route::get('/get-designations/{id?}', [DesignationController::class, 'getDesignations']);

// Employee info
Route::post('/new-employees', [EmployeeController::class, 'saveEmployeeInformation']);
Route::get('/get-employees/{id?}', [EmployeeController::class, 'getEmployeeInformation']);

// Customer info
Route::post('/add-new-customer', [CustomerController::class, 'saveNewCustomerInformation']);
Route::get('/get-customers/{id?}', [CustomerController::class, 'getCustomerInformation']);
Route::post('customer/search-customer', [CustomerController::class, 'searchCustomerInformation'])->name('search_customer_information');
Route::post('customer/update-customer-conection-status', [CustomerController::class, 'updateCustomerConnectStatus']); //->name('update-customer-connection-status');
Route::get('/customer/get-customer-list', [CustomerController::class, 'getCustomerList']);



// Customer Connection Details
Route::post('/new-connection', [ConnectionInfoController::class, 'saveConnectionInfo']);
Route::get('/get-connection-details/{id?}', [ConnectionInfoController::class, 'getConnectionInfo']);

// Customer Payment Details
Route::post('/save-payment', [BillController::class, 'saveCustomerPaymentInfo']);
Route::get('/get-payment-details/{id?}', [BillController::class, 'getCustomerPaymentDetails']);

Route::post('/login', [LoginController::class, 'login']);

// Connection Status
Route::post('/save-connection-status', [ConnectionStatusController::class, 'saveConnectionStatusInfo']);
Route::get('/get-connection-status/{id?}', [ConnectionStatusController::class, 'getConnectionStatusInfo']);
