@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Credit Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('credit_update_form') }}" method="POST" class="form-horizontal">
                        
                        @csrf
                        <input type="hidden" name="credit_id" value="{{ $credit->credit_id }}">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Credit Head<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="credit_head" class="form-control" value="{{ $credit->credit_head }}">
                                @error('credit_head')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Remarks</label>
                            <div class="col-md-7">
                                <textarea name="credit_remarks" class="form-control" id="" rows="2"> {{ $credit->credit_remarks }} </textarea>
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