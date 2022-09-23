<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Admin\CategoryController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Image;


class BrandController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DATABASE OPERATION
    |--------------------------------------------------------------------------
    */
    // ajax Method
    public function categoryWiseBrand(Request $request)
    {
        $getBrand = Brand::where('CateId', $request->CategoryID)->get();
        return json_encode($getBrand);
    }

    public function categoryWiseBrandList($CategoryID)
    {
        $getBrand = Brand::where('CateId', $CategoryID)->get();
        return ($getBrand);
    }
    // ajax Method

    public function updateBrandNameStatus($brandId)
    {
        //  return $brandId;
        $update = Brand::where('BranStatus', true)->where('BranId', $brandId)->update([
            'BranStatus' => 0
        ]);
    }


    public function getAll()
    {
        return $allBrand = Brand::with('cateInfo')->where('BranStatus', true)->orderBy('BranId', 'DESC')->get();
    }
    /*
    |--------------------------------------------------------------------------
    | BLADE OPERATION
    |--------------------------------------------------------------------------
    */
    public function add()
    {
        $allBrand = $this->getAll();
        //  dd($allBrand);
        $CategoryOBJ = new CategoryController();
        $allCate = $CategoryOBJ->getAll();
        return view('admin.brand.add', compact('allCate', 'allBrand'));
    }

    public function edit($id)
    {
        $allBrand = $this->getAll();
        $data = $allBrand->where('BranId', $id)->firstOrFail();
        $CategoryOBJ = new CategoryController();
        $allCate = $CategoryOBJ->getAll();
        return view('admin.brand.add', compact('data', 'allCate', 'allBrand'));
    }


    public function delete($id)
    {
        $allBrand = $this->getAll();
        $delete = Brand::where('BranId', $id)->delete();
        if ($delete) {
            Session::flash('delete', 'Brand delete');
        } else {
            Session::flash('error', 'please try again.');
        }
        return redirect()->back();
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'BranName' => 'required|max:150',
            'CategoryID' => 'required',
        ], [
            'BranName.required' => 'please enter brand name',
            'CategoryID.required' => 'please select category name',
            'BranName.max' => 'max brand name content is 150 character',
        ]);

        $BranName = strtolower($request->BranName);
        $brands = Brand::where('CateId', $request->CategoryID)->where('BranName', $BranName)->count();

        if ($brands > 0) {
            Session::flash('error', 'this name already exit, please another name.');
            return redirect()->back();
        } else {
            $insert = Brand::insertGetId([
                'CateId' => $request['CategoryID'],
                'BranName' => $BranName,
                'created_at' => Carbon::now('Asia/Dhaka')->toDateTimeString(),
            ]);

            if ($insert) {
                Session::flash('success', 'new brand store Successfully.');
                return redirect()->route('brand.add');
            } else {
                Session::flash('error', 'please try again.');
                return redirect()->back();
            }
        }
    }


    public function update(Request $request)
    {
        $id = $request->BranId;
        $this->validate($request, [
            'BranName' => 'required|max:150|unique:brands,BranName,' . $id . ',BranId',
            // 'BranName' => 'required|unique:brands,BranName,'.$id.',BranId,CateId,'.$CateId,
            'CategoryID' => 'required',
        ], [
            'BranName.required' => 'please enter brand name',
            'CateId.required' => 'please select category name',
            'BranName.max' => 'max brand name content is 150 character',
            'BranName.unique' => 'this brand name already exists! please another name',
        ]);

        $update = Brand::where('BranStatus', true)->where('BranId', $id)->update([
            'CateId' => $request['CategoryID'],
            'BranName' => $request['BranName'],
            'updated_at' => Carbon::now('Asia/Dhaka')->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'brand updated Successfully.');
            return redirect()->route('brand.add');
        } else {
            Session::flash('error', 'please try again.');
            return redirect()->back();
        }
    }
}
