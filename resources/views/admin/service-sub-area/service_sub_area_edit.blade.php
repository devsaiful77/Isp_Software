@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Service Sub Area Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('service_sub_area_update_form') }}" method="POST" class="form-horizontal">
                        @csrf

                        <input type="text" name="serviceSubAreaId" value="{{ $serviceSubArea->serviceSubAreaId }}">

                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label text-right">Service Area Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <select class="form-control" name="serviceAreaId">
                                    <option value="">-- Select Service Area Name --</option>
                                    @foreach($serviceAreas as $serviceArea)
                                        <option value="{{ $serviceArea->serviceAreaId }}" {{ $serviceArea->serviceAreaId == $serviceSubArea->serviceAreaId ? 'selected': '' }}>{{ $serviceArea->serviceAreaName }}</option>
                                    @endforeach
                                </select>
                                @error('serviceAreaId')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Service Sub Area Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="serviceSubAreaName" class="form-control" value="{{ $serviceSubArea->serviceSubAreaName }}">
                                
                                @error('serviceSubAreaName')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Service Sub Area Remarks<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="serviceSubAreaRemarks" class="form-control" value="{{ $serviceSubArea->serviceSubAreaRemarks }}">
                                
                                @error('serviceSubAreaRemarks')
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