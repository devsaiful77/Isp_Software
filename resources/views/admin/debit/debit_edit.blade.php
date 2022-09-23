@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Debit Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('debit_update_form') }}" method="POST" class="form-horizontal">
                        
                        @csrf
                        <input type="hidden" name="debit_id" value="{{ $debit->debit_id }}">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Debit Head<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="debit_head" class="form-control" value="{{ $debit->debit_head }}">
                                @error('debit_head')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Remarks</label>
                            <div class="col-md-7">
                                <textarea name="debit_remarks" class="form-control" id="" rows="2"> {{ $debit->debit_remarks }} </textarea>
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