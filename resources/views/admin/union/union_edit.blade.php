@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Union Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('union_update_form') }}" method="POST" class="form-horizontal">
                        @csrf

                        <input type="hidden" name="unionId" value="{{ $union->unionId }}">

                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label text-right">Upazila Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <select class="form-control" name="upazilaId">
                                    <option value="">-- Select Upazila Name --</option>
                                    @foreach($upazilas as $upazila)
                                        <option value="{{ $upazila->upazilaId }}" {{ $upazila->upazilaId == $union->upazilaId ? 'selected': '' }}>{{ $upazila->upazilaName }}</option>
                                    @endforeach
                                </select>
                                @error('upazilaId')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Upazila Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="unionName" class="form-control" value="{{ $union->unionName }}">
                                @error('unionName')
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