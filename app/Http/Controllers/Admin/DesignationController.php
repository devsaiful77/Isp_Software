<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Validator;
use Exception;

class DesignationController extends Controller
{
    public function getDesignations($id = null)
    {

        try {
            if ($id == null) {
                $aService = Designation::all();
            } else {
                $aService = Designation::where('serviceTypeId', $id)->get();
            }
            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $aService]);
        } catch (ModelNotFoundException $ex) {
            return response()->json([
                'success' => 'false', 'status_code' => '404',
                'error' => 'Invalid:Model Not Found'
            ]);
        } catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'error' => $ex->getMessage()]);
        }
    }
}
