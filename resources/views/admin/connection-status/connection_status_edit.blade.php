@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Connection Status Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('connection_status_area_update_form') }}" method="POST" class="form-horizontal">
                        @csrf

                        <input type="hidden" name="connectionStatusId" value="{{ $connectionStatus->connectionStatusId }}">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Connection Status Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="connectionName" class="form-control" value="{{ $connectionStatus->connectionName }}">
                                @error('connectionName')
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