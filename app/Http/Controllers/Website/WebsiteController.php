<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\BannerInfo;
use App\Models\PackageInfo;

class WebsiteController extends Controller{
    public function index(){
        $packages = PackageInfo::orderBy('packageId','ASC')->get();
        $banners = BannerInfo::where('isActive',1)->orderBy('bannerId','ASC')->get();
        return view('website.home.home', compact('banners','packages'));
    }
    public function about(){
        return view('website.about.about');
    }
    public function service(){
        return view('website.service.service');
    }
    public function package(){
        return view('website.package.package');
    }
    public function contact(){
        return view('website.contact.contact');
    }
}
