@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Pop Address</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('pop_address_update_form') }}" method="POST" class="form-horizontal">
                        
                        @csrf
                        <input type="text" name="pop_id" value="{{ $popAddress->pop_id }}">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="pop_name" class="form-control" placeholder="Name" value="{{ $popAddress->pop_name }}">
                                @error('pop_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Email</label>
                            <div class="col-md-7">
                                <input type="email" name="pop_email" class="form-control" placeholder="Name" value="{{ $popAddress->pop_email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Phone<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="pop_phone" class="form-control" placeholder="Name" value="{{ $popAddress->pop_phone }}">
                                @error('pop_phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Address</label>
                            <div class="col-md-7">
                                <textarea name="pop_address" class="form-control" id="" placeholder="Address" rows="2"> {{ $popAddress->pop_address }} </textarea>
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