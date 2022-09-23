@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update User Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('user_update_form') }}" method="POST" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Email<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Phone</label>
                            <div class="col-md-7">
                                <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ $user->phone }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">User Role<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <select class="form-control" name="role_id">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected': '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Pop Address<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <select class="form-control" name="pop_id">
                                    @foreach($popAddresses as $aRecord)
                                        <option value="{{ $aRecord->pop_id }}" {{ $aRecord->pop_id == $user->pop_id ? 'selected': '' }}>{{ $aRecord->pop_name }}</option>
                                    @endforeach
                                </select>
                                @error('pop_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Password<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="password" name="password" class="form-control" placeholder="Password" value="{{ $user->password }}">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Confirm Password<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" value="{{ $user->password_confirmation }}">
                                @error('password_confirmation')
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