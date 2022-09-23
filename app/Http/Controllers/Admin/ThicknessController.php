<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thickness;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Image;


class ThicknessController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DATABASE OPERATION
    |--------------------------------------------------------------------------
    */
    // ajax Method
    public function sizeWiseThickness(Request $request)
    {
        $getThickness = Thickness::where('SizeId', $request->Size)->get();
        return json_encode($getThickness);
    }
    // ajax Method

    public function idWiseActiveThicknessList($SizeID){
        return Thickness::where('ThicStatus', true)->where('SizeId', $SizeID)->get();
    }

    public function countActiveThicknessList($SizeID){
        return Thickness::where('ThicStatus', true)->where('SizeId', $SizeID)->count();
    }
    public function updateThicknessStatus($thikId)
    {
        return $update = Thickness::where('ThicStatus', true)->where('ThicId', $thikId)->update([
            'ThicStatus' => 0
        ]);
    }
    public function getAll()
    {
        return  $allThickness = Thickness::with('cateInfo', 'brandInfo', 'sizeInfo')->where('ThicStatus', true)->orderBy('ThicId', 'DESC')->get();
    }

    public function add()
    {
        $allThickness = $this->getAll();
        $CateOBJ = new CategoryController();
        $allCate = $CateOBJ->getAll();
        return view('admin.thickness.add', compact('allThickness', 'allCate'));
    }

    public function edit($id)
    {
        $allThickness = $this->getAll();
        $data = $allThickness->where('ThicId', $id)->firstOrFail();

        $CateOBJ = new CategoryController();
        $allCate = $CateOBJ->getAll();
        return view('admin.thickness.add', compact('data', 'allThickness', 'allCate'));
    }

    public function delete($id){
        $delete = Thickness::where('ThicId',$id)->delete();
        if($delete){
            Session::flash('delete', 'thickness delete');
        }else{
            Session::flash('error', 'please try again.'); 
        }
        return redirect()->back();
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'ThicName' => 'required|max:150',
            'CategoryID' => 'required',
            'BranID' => 'required',
            'SizeID' => 'required',
        ], [
            'CategoryID.required' => 'please enter category name',
            'BranID.required' => 'please enter thickness name',
            'SizeID.required' => 'please select size name',
            'ThicName.max' => 'max thickness name content is 150 character',
        ]);

        $ThicName = strtolower($request->ThicName);
        $Thickness = Thickness::where('CateId', $request->CategoryID)->where('BranId', $request->BranID)->where('SizeId', $request->SizeID)->where('ThicName', $ThicName)->count();

        if ($Thickness > 0) {

            Session::flash('error', 'this thicknrss allready exit, please another thicknrss.');
            return redirect()->back();
        }

        $insert = Thickness::insertGetId([
            'CateId' => $request['CategoryID'],
            'BranId' => $request['BranID'],
            'SizeId' => $request['SizeID'],
            'ThicName' => $ThicName,
            'created_at' => Carbon::now('Asia/Dhaka')->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'new thickness store Successfully.');
            return redirect()->route('thickness.add');
        } else {
            Session::flash('error', 'please try again.');
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $id = $request->ThicId;
        $this->validate($request, [
            'ThicName' => 'required|max:150',
            'CategoryID' => 'required',
            'BranID' => 'required',
            'SizeID' => 'required',
        ], [
            'ThicName.required' => 'please enter thickness name',
            'SizeId.required' => 'please select size name',
            'ThicName.max' => 'max thickness name content is 150 character',
        ]);


        $update = Thickness::where('ThicStatus', true)->where('ThicId', $id)->update([
            'CateId' => $request['CategoryID'],
            'BranId' => $request['BranID'],
            'SizeId' => $request['SizeID'],
            'ThicName' => $request['ThicName'],
            'updated_at' => Carbon::now('Asia/Dhaka')->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'thickness update Successfully.');
            return redirect()->route('thickness.add');
        } else {
            Session::flash('error', 'please try again.');
            return redirect()->back();
        }
    }
}
