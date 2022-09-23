<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Image;


class CategoryController extends Controller{
    /*
    |--------------------------------------------------------------------------
    | DATABASE OPERATION
    |--------------------------------------------------------------------------
    */
    public function getAll(){
      return $allCate = Category::where('CateStatus',true)->orderBy('CateId','DESC')->get();
    }


    public function add(){
       $allCate = Category::where('CateStatus',true)->orderBy('CateId','DESC')->get();
        return view('admin.category.add', compact('allCate'));
    }

    public function edit($id){
        $data = Category::where('CateStatus',true)->where('CateId',$id)->firstOrFail();
        $allCate = Category::where('CateStatus',true)->orderBy('CateId','DESC')->get();
        return view('admin.category.add', compact('data', 'allCate'));
    }

    public function delete($id){
        $delete = Category::where('CateStatus',true)->where('CateId',$id)->delete();
        if($delete){
            Session::flash('delete', 'Category delete');
        }else{
            Session::flash('error', 'please try again.'); 
        }
        return redirect()->back();
    }

    public function store(Request $request){
        $this->validate($request,[
            'CateName'=>'required|unique:categories,CateName|max:200'
        ],[
            'CateName.required'=> 'please enter category name',
            'CateName.max'=> 'max category name content is 200 character',
            'CateName.unique' => 'this category name already exists! please another name',
        ]);
        $catName=strtolower($request->CateName);
        
        $insert = Category::insertGetId([
            'CateName'=>$catName,
        ]);

        if($insert){
            Session::flash('success','new category store Successfully.');
                return redirect()->route('category.add');
        }else{
            Session::flash('error','please try again.');
                return redirect()->back();
        }

    }

    public function update(Request $request){
        $id= $request->CateId;
        $this->validate($request,[
            'CateName'=>'required|max:200|unique:categories,CateName,'.$id.',CateId',
        ],[
            'CateName.required'=> 'please enter category name',
            'CateName.max'=> 'max category name content is 200 character',
            'CateName.unique' => 'this category name already exists! please another name',
        ]);

        $insert = Category::where('CateStatus',true)->where('CateId',$id)->update([
            'CateName'=>$request['CateName'],
        ]);

        if($insert){
            Session::flash('success','category updated Successfully.');
                return redirect()->route('category.add');
        }else{
            Session::flash('error','please try again.');
                return redirect()->back();
        }

    }


}
