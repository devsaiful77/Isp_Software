@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Accounts Head Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('accounts_head_update_form') }}" method="POST" class="form-horizontal">
                        
                        @csrf
                        <input type="hidden" name="account_id" value="{{ $accountsHead->account_id }}">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Credit Head<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="account_head_title" class="form-control" placeholder="Account Head Title" value="{{ $accountsHead->account_head_title }}">
                                @error('account_head_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Account Number<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="account_number" class="form-control" placeholder="Account Number" value="{{ $accountsHead->account_number }}">
                                @error('account_number')
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