<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DebitCreditController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Service\DeviceInfoService;
use Illuminate\Http\Request;
use App\Models\ProductPurchase;
use App\Models\PurchaseRecord;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

use Cart;
use Illuminate\Support\Facades\Auth;


class ProductPurchaseController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | DATABASE OPERATION
  |--------------------------------------------------------------------------
  */

  public function getAll()
  {
    return $all = ProductPurchase::where('status', true)->orderBy('ProdPurcId', 'DESC')->get();
  }
  // Produt Purchase Form Save Button Action
  public function store(Request $request)
  {
    // form validation

    $request['TranAmount'] = $request->PayAmount;
    $request['TranTypeId'] = 1;

    // $transObj = new  TransactionsController();
    $transId = 1; // $transObj->createNewTransaction($request); 


    // Credit Transaction
    // $request['Amount'] = $request->PayAmount;
    // $request['TranId'] = $transId;
    // $request['ChartOfAcctId'] = 1;
    // $request['DrCrTypeId'] = 1;
    // $decrObj = new  DebitCreditController();
    // $drcrId = $decrObj->insertNewDebitCreditTransaction($request); 

    // Debit Transaction
    // $request['ChartOfAcctId'] = 1;
    // $request['DrCrTypeId'] = 2;
    // $drcrId = $decrObj->insertNewDebitCreditTransaction($request); 

    $CreateBy = Auth::user()->id;

    // insert data in database
    $insert = ProductPurchase::insertGetId([
      'TransactionId' => $transId,
      'TotalPrice' => $request->PayAmount,
      'PurchaseDate' => $request->PurchaseDate,
      'VendorId' => 1, //$request->VendorName,
      'LabourCost' => 0, //$request->LabourCost,
      'PaymentType' => 1,
      'BankId' => 1,
      'Discount' => $request->Discount,
      'CarringCost' => $request->CarryingBill,
      'DoNo' => "", // $request->doNO,
      'TruckNo' => "", //$request->TruckNo,
      'CreateById' => $CreateBy,
      'created_at' => Carbon::now(),
    ]);

    // update Vendor Due Amount
    // $vendorObj = new  VendorController();
    // $aVendor = $vendorObj->updateVendorBalance($request->VendorName,$request->PayAmount); 

    // insert Cart Content
    // $stockConObj = new  StockController();

    $carts = Cart::content();
    foreach ($carts as $data) {
      PurchaseRecord::insert([
        'Quantity' => $data->qty,
        'UnitPrice' => $data->price,
        'Amount' => $data->subtotal,
        'ProdPurcId' => $insert,
        'CateId' => $data->options->CategoryId,
        'BranId' => $data->options->BranId,
        'SizeId' => $data->options->Size,
        // 'ThicId' => $data->options->Thickness,
      ]);
      //   $stockUpdate = $stockConObj->updateProductStockByCategoryBrandSizeThicknessId(
      //    $data->options->CategoryId,$data->options->BranId
      //   ,$data->options->Size,$data->options->Thickness,$data->qty); 

    }

    // Cart Destroy
    // Cart::destroy();
    // Redirect Back
    if ($insert) {
      Session::flash('success', 'value');
      return redirect()->back();
    }
  }


  /* ++++++++++++ Ajax Method IN Add To Cart ++++++++++++ */
  public function productAddToCart(Request $request)
  {

    // dd('callim');
    $id = uniqid();
    Cart::add([
      'id' => $id,
      'name' => 'Device Purchase',
      'qty' => $request->Qunatity,
      'price' => $request->UnitPrice,
      'weight' => 1,
      'options' => [
        'CategoryId' => $request->CategoryId,
        'BranId' => $request->BranId,
        'Size' => $request->Size,
        // Name
        'CategoryName' => $request->CategoryName,
        'BrandName' => $request->BrandName,
        'SizeName' => $request->SizeName,
        'Remarks' => $request->Remarks,
      ]
    ]);
    return response()->json(['success' => 'Successfully Added Cart On Item']);
  }

  // Order list in Add To Card
  public function getOrderList()
  {
    $carts = Cart::content();
    $cartQty = Cart::count();
    $cartTotal = Cart::total();

    // dd($carts);
    return response()->json(array(
      'carts' => $carts,
      'cartQty' => $cartQty,
      'cartTotal' => $cartTotal,
    ));
  }

  public function QunatityIncrement(Request $request)
  {
    $row = Cart::get($request->rowId);
    Cart::update($request->rowId, $row->qty + 1);
    return response()->json('increment');
  }

  public function QunatityDecrement(Request $request)
  {
    $row = Cart::get($request->rowId);
    Cart::update($request->rowId, $row->qty - 1);
    return response()->json('decrement');
  }

  public function productRemoveToCart(Request $request)
  {
    Cart::remove($request->id);
    return response()->json(['success' => 'Product Remove From Cart']);
  }
  /* ++++++++++++ Ajax Method IN Add To Cart ++++++++++++ */





  /*
  |--------------------------------------------------------------------------
  | BLADE OPERATION
  |--------------------------------------------------------------------------
  */

  public function devicePurchaseForm()
  {
    // Category Object
    // $VendorOBJ = new VendorController();
    $vendorList = array(
      "VendId" => 1,
      "VendName" => "Test -1"
    );

    // $VendorOBJ->getAll();
    // Category Object
    $purchaseRecord = $this->getAll();
    $CatgOBJ = new CategoryController();
    $allCatg = $CatgOBJ->getAll();
    // Cart Destroy
    //  Cart::destroy();
    return view('admin.purchase.add', compact('purchaseRecord', 'allCatg', 'vendorList'));
  }

  public function getDeviceInventory()
  {

    $devices = (new DeviceInfoService())->getAllDeviceInventory();
    // dd($devices);
    return view('admin.purchase.device-stock', compact('devices'));
  }








  /*
  |--------------------------------------------------------------------------
  | API OPERATION
  |--------------------------------------------------------------------------
  */


  /* ___________________________ ***** ___________________________ */
}
