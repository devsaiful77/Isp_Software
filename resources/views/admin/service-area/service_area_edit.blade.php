@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Service Area Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('service_area_update_form') }}" method="POST" class="form-horizontal">
                        @csrf

                        <input type="hidden" name="serviceAreaId" value="{{ $serviceArea->serviceAreaId }}">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Service Area Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="serviceAreaName" class="form-control" value="{{ $serviceArea->serviceAreaName }}">
                                
                                @error('serviceAreaName')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Service Area Remarks<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="serviceAreaRemarks" class="form-control" value="{{ $serviceArea->serviceAreaRemarks }}">
                                
                                @error('serviceAreaRemarks')
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