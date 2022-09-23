@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Banner Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('banner_update_form') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Banner Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="bannerName" class="form-control" placeholder="Banner Name" value="{{ $banner->bannerName }}">
                                <input type="hidden" name="bannerId" value="{{ $banner->bannerId }}">
                                @error('bannerName')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Banner Title<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="bannerTitle" class="form-control" placeholder="Banner Title" value="{{ $banner->bannerTitle }}">
                                @error('bannerTitle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Banner SubTitle<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="bannerSubTitle" class="form-control" placeholder="Banner SubTitle" value="{{ $banner->bannerSubTitle }}">
                                @error('bannerSubTitle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Banner URL<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="bannerUrl" class="form-control" placeholder="Banner URL" value="{{ $banner->bannerUrl }}">
                                @error('bannerUrl')
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