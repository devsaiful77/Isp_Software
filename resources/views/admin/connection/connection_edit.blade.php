@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Union Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('connection_update_form') }}" method="POST" class="form-horizontal">
                        @csrf

                        <input type="hidden" name="connectionId" value="{{ $connection->connectionId }}">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">ipAddress<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="ipAddress" class="form-control" placeholder="ipAddress" value="{{ $connection->ipAddress }}">
                                @error('ipAddress')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">User Id<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="userId" class="form-control" placeholder="userId" value="{{ $connection->userId }}">
                                @error('userId')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">User Password<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="password" name="userPassword" class="form-control" placeholder="userPassword" value="{{ $connection->userPassword }}">
                                @error('userPassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Description<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="description" class="form-control" placeholder="description" value="{{ $connection->description }}">
                                @error('description')
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