@extends('layouts.admin')
@section('content')




    <div class="row">
        <div class="col-md-3">
            <div class="card card-inverse card-info">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="m-r-20 align-self-center">
                            <h1 class="text-white"><i class="mdi mdi-folder-image"></i></h1></div>
                        <div class="link-share">
                            <h3 class="card-title" style="font-size:14px;"></h3>
                            <a href="{{ route('banner_new_form') }}"><i class="fa fa-share-square fa-lg pr-2"></i>Banner</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            @php
                                $banner=App\Models\BannerInfo::where('isActive',0)->count();
                            @endphp
                            <h2 class="font-light text-white"><sup><small></small></sup>
                                @if($banner<=10)
                                    0{{$banner}}
                                @else
                                    {{$banner}}
                                @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-inverse card-info">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="m-r-20 align-self-center">
                            <h1 class="text-white"><i class="mdi mdi-face-profile"></i></h1></div>
                        <div class="link-share">
                            <h3 class="card-title" style="font-size:14px;"></h3>
                            <a href="{{ route('company_profile_form') }}"><i class="fa fa-share-square fa-lg pr-2"></i>Profile</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            @php
                                $profile=App\Models\CompanyInfo::count();
                            @endphp
                            <h2 class="font-light text-white"><sup><small></small></sup>
                                @if($profile<=10)
                                    0{{$profile}}
                                @else
                                    {{$profile}}
                                @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-inverse card-info">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="m-r-20 align-self-center">
                            <h1 class="text-white"><i class="mdi mdi-server"></i></h1></div>
                        <div class="link-share">
                            <h3 class="card-title" style="font-size:14px;"></h3>
                            <a href="{{ route('service_type_new_form') }}"><i class="fa fa-share-square fa-lg pr-2"></i>Service Type</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            @php
                                $serviceType=App\Models\ServiceType::count();
                            @endphp
                            <h2 class="font-light text-white"><sup><small></small></sup>
                                @if($serviceType<=10)
                                    0{{$serviceType}}
                                @else
                                    {{$serviceType}}
                                @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-inverse card-info">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="m-r-20 align-self-center">
                            <h1 class="text-white"><i class="mdi mdi-package-variant"></i></h1></div>
                        <div class="link-share">
                            <h3 class="card-title" style="font-size:14px;"></h3>
                            <a href="{{ route('package_info_new_form') }}"><i class="fa fa-share-square fa-lg pr-2"></i>Package Details</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            @php
                                $packageInfo=App\Models\PackageInfo::count();
                            @endphp
                            <h2 class="font-light text-white"><sup><small></small></sup>
                                @if($packageInfo<=10)
                                    0{{$packageInfo}}
                                @else
                                    {{$packageInfo}}
                                @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-inverse card-info">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="m-r-20 align-self-center">
                            <h1 class="text-white"><i class="mdi mdi-human-child"></i></h1></div>
                        <div class="link-share">
                            <h3 class="card-title" style="font-size:14px;"></h3>
                            <a href="{{ route('customer_new_form') }}"><i class="fa fa-share-square fa-lg pr-2"></i>Total Customer</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            @php
                                $customer=App\Models\Customer::count();
                            @endphp
                            <h2 class="font-light text-white"><sup><small></small></sup>
                                @if($customer<=10)
                                    0{{$customer}}
                                @else
                                    {{$customer}}
                                @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-inverse card-info">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="m-r-20 align-self-center">
                            <h1 class="text-white"><i class="mdi mdi-credit-card"></i></h1></div>
                        <div class="link-share">
                            <h3 class="card-title" style="font-size:14px;"></h3>
                            <a href="{{ route('payment_new_form') }}"><i class="fa fa-share-square fa-lg pr-2"></i>Collection Amount</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            <h2 class="font-light text-white"><sup><small></small></sup>
                                @php
                                    $totalAmount = App\Models\PaymentInfo::whereMonth('created_at', date('m'))
                                        ->whereYear('created_at', date('Y'))
                                        ->sum('amount');
                                @endphp

                                @if($totalAmount<=10)
                                    0{{$totalAmount}}
                                @else
                                    {{$totalAmount}}
                                @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-inverse card-info">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="m-r-20 align-self-center">
                            <h1 class="text-white"><i class="mdi mdi-library-books"></i></h1></div>
                        <div class="link-share">
                            <h3 class="card-title" style="font-size:14px;"></h3>
                            <a href="{{ route('dr_voucher_new_form') }}"><i class="fa fa-share-square fa-lg pr-2"></i>Daily Cost Information</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            @php
                                $drVoucher=App\Models\DrVoucher::count();
                            @endphp
                            <h2 class="font-light text-white"><sup><small></small></sup>
                                @if($drVoucher<=10)
                                    0{{$drVoucher}}
                                @else
                                    {{$drVoucher}}
                                @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-inverse card-info">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="m-r-20 align-self-center">
                            <h1 class="text-white"><i class="mdi mdi-library-books"></i></h1></div>
                        <div class="link-share">
                            <h3 class="card-title" style="font-size:14px;"></h3>
                            <a href="#"><i class="fa fa-share-square fa-lg pr-2"></i>New Customer Running Month</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            @php

                                $fromdate = date('2022-05-01');
                                $toDate = date('2022-05-30');

                                $newCustomer=App\Models\Customer::where('created_at', '>=', $fromdate)
                            ->where('created_at', '<=', $toDate)->count();
                            @endphp
                            <h2 class="font-light text-white"><sup><small></small></sup>
                                @if($newCustomer<=10)
                                    0{{$newCustomer}}
                                @else
                                    {{$newCustomer}}
                                @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-inverse card-info">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="m-r-20 align-self-center">
                            <h1 class="text-white"><i class="mdi mdi-library-books"></i></h1></div>
                        <div class="link-share">
                            <h3 class="card-title" style="font-size:14px;"></h3>
                            <a href="#"><i class="fa fa-share-square fa-lg pr-2"></i>Active Customer</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            @php

                                $fromdate = date('2022-05-01');
                                $toDate = date('2022-05-30');

                                $activeCustomer=App\Models\Customer::where('connectionStatusId',2)->where('created_at', '>=', $fromdate)
                            ->where('created_at', '<=', $toDate)->count();
                            @endphp
                            <h2 class="font-light text-white"><sup><small></small></sup>
                                @if($activeCustomer<=10)
                                    0{{$activeCustomer}}
                                @else
                                    {{$activeCustomer}}
                                @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-inverse card-info">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="m-r-20 align-self-center">
                            <h1 class="text-white"><i class="mdi mdi-library-books"></i></h1></div>
                        <div class="link-share">
                            <h3 class="card-title" style="font-size:14px;"></h3>
                            <a href="#"><i class="fa fa-share-square fa-lg pr-2"></i>Running Bill Paid</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            @php
                                $currentMonth =(int) Date('m');
                                $billPaid=App\Models\PaymentInfo::where('payMonth', '=', $currentMonth)->count();
                            @endphp
                            <h2 class="font-light text-white"><sup><small></small></sup>
                                @if($billPaid<=10)
                                    0{{$billPaid}}
                                @else
                                    {{$billPaid}}
                                @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-inverse card-info">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="m-r-20 align-self-center">
                            <h1 class="text-white"><i class="mdi mdi-library-books"></i></h1></div>
                        <div class="link-share">
                            <h3 class="card-title" style="font-size:14px;"></h3>
                            <a href="#"><i class="fa fa-share-square fa-lg pr-2"></i>Bill Unpaid</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            <h2 class="font-light text-white"><sup><small></small></sup>
                            @php
                                $runningMonth = (int) Date('m');
                                $unpaidCoustomers = App\Models\Customer::whereNotIn('customerAutoId',(App\Models\PaymentInfo::select('customerId')->where('payMonth', $runningMonth)))->count();
                            @endphp

                                @if($unpaidCoustomers<=10)
                                    0{{$unpaidCoustomers}}
                                @else
                                    {{$unpaidCoustomers}}
                                @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-briefcase-check text-info"></i></h2>
                        <h3 class="">
                            50
                        </h3>
                        <h6 class="card-subtitle">All User</h6></div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-alert-circle text-success"></i></h2>
                        <h3 class="">
                            100
                        </h3>
                        <h6 class="card-subtitle">Total Income</h6></div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 40%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-wallet text-purple"></i></h2>
                        <h3 class="">
                            150
                        </h3>
                        <h6 class="card-subtitle">Total Expense</h6></div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 56%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-buffer text-warning"></i></h2>
                        <h3 class="">
                            200
                        </h3>
                        <h6 class="card-subtitle">Total Savings</h6></div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 26%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection