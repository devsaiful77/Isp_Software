@extends('layouts.admin')
@section('content')
<div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Package Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('package_info_update_form') }}" method="POST" class="form-horizontal">
                        @csrf

                        <input type="hidden" name="packageId" value="{{ $packageInfo->packageId }}">

                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label text-right">Service Type<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <select class="form-control" name="serviceTypeId">
                                    <option value="">-- Select Service Type --</option>
                                    @foreach($serviceTypes as $serviceType)
                                        <option value="{{ $serviceType->serviceTypeId }}" {{ $serviceType->serviceTypeId == $packageInfo->serviceTypeId ? 'selected': '' }}>{{ $serviceType->serviceName }}</option>
                                    @endforeach
                                </select>
                                @error('serviceTypeId')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Service Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="packageName" class="form-control" placeholder="Package Name" value="{{ $packageInfo->packageName }}">
                                @error('packageName')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Bandwidth<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="bandwidth" class="form-control" placeholder="Package Name" value="{{ $packageInfo->bandwidth }}">
                                @error('bandwidth')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Price<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="price" class="form-control" placeholder="Package Name" value="{{ $packageInfo->price }}">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Package Code<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="packageCode" class="form-control" placeholder="Package Name" value="{{ $packageInfo->packageCode }}">
                                @error('packageCode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info registration-btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection