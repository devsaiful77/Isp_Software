<?php

namespace App\Http\Controllers\Admin;

 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Http\Controllers\Helpers\FileUploadController;
use App\Models\Employee;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Validator;

class EmployeeController extends Controller
{
    

public function saveEmployeeInformation(Request $request) {

   $validator = Validator::make($request->all(), [
      'EmployeeName' => 'required',
      'FatherName' => 'required',
      'EmpEmail' => 'required',
      'PhoneNo1' => 'required',
      'PhoneNo2' => 'required',
      'JoinDate' => 'required',
      'DesignationId' => 'required',
      'DivisionId' => 'required',
      'DistrictId' => 'required',
      'UpazilaId' => 'required',
      'Village' => 'required',
      'PostOffice' => 'required',
      'Details' => 'required',
      'ServiceAreaId' => 'required',
      'Photo' => 'required',
      'NID' => 'required'
  ]); 

  if ($validator->fails()) {
      return response()->json(['success' => 'false', 'status_code' => '401', 'error' =>'error', 'message' => $validator->errors()]);
  }

  try {
    $uploadObj = new FileUploadController();
    $proImgPath = $uploadObj->uploadEmployeeProfileImage($request);
    $nidPath = $uploadObj->uploadEmployeeNIDImage($request);

    $anEmployee = new Employee;

    $anEmployee->EmployeeName =  $request->input('EmployeeName');
    $anEmployee->FatherName = $request->input('FatherName');
    $anEmployee->EmpEmail =  $request->input('EmpEmail');
    $anEmployee->PhoneNo1 = $request->input('PhoneNo1');
    $anEmployee->PhoneNo2 = $request->input('PhoneNo2');
    $anEmployee->JoinDate = $request->input('JoinDate');
    $anEmployee->DesignationId = $request->input('DesignationId');
    $anEmployee->DivisionId = $request->input('DivisionId');
    $anEmployee->DistrictId = $request->input('DistrictId');
    $anEmployee->UpazilaId = $request->input('UpazilaId');
    $anEmployee->Village = $request->input('Village');
    $anEmployee->PostOffice = $request->input('PostOffice');
    $anEmployee->Details = $request->input('Details');
    $anEmployee->ServiceAreaId = $request->input('ServiceAreaId');
    $anEmployee->Photo =  $proImgPath;
    $anEmployee->NID = $nidPath;
    $anEmployee->IsActive = '1';

    $result = $anEmployee->save();

    $anEmployee->all()->last();
   return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $anEmployee]);

       }catch (Exception $ex) {
        return response()->json(['success' => 'false', 'status_code' => '500', 'message' => $ex->getMessage(),'error'=>'error']);
       }

}



public function getEmployeeInformation($id=null){

    try{ 
      if($id==null){
         $aemployee = Employee::all();
      }else{
      $aemployee = Employee::where('EmployeeId',$id)->get();
      }
      return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $aemployee]);

  } catch (ModelNotFoundException $ex) {
      return response()->json(['success' => 'false', 'status_code' => '404',
       'error' => 'Invalid:Model Not Found']);
  } catch (Exception $ex) {
      return response()->json(['success' => 'false', 'status_code' => '500', 'error' => $ex->getMessage()]);
  }


}

}
