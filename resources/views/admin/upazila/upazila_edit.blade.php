@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Upazila Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('upazila_update_form') }}" method="POST" class="form-horizontal">
                        @csrf

                        <input type="hidden" name="upazilaId" value="{{ $upazila->upazilaId }}">

                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label text-right">District Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <select class="form-control" name="districtId">
                                    <option value="">-- Select District Name --</option>
                                    @foreach($districts as $district)
                                        <option value="{{ $district->districtId }}" {{ $district->districtId == $upazila->districtId ? 'selected': '' }}>{{ $district->districtName }}</option>
                                    @endforeach
                                </select>
                                @error('districtId')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Upazila Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="upazilaName" class="form-control" value="{{ $upazila->upazilaName }}">
                                @error('upazilaName')
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