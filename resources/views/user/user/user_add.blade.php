@extends('layouts.admin')
@section('content')

    @isset(auth()->user()->role->permission['permission']['usermanagement']['add'])
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header print_none">
                        <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add User Information</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user_insert_form') }}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Name<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Email<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Phone</label>
                                <div class="col-md-7">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">User Role<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <select class="form-control" name="role_id">
                                        <option value="">-- Select User Role --</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
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
                                        <option value="">-- Select Pop Address --</option>
                                        @foreach($popAddresses as $aRecord)
                                            <option value="{{ $aRecord->pop_id }}">{{ $aRecord->pop_name }}</option>
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
                                    <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Confirm Password<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" value="{{ old('password') }}">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info registration-btn">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endisset




    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All User Information</h4>
                </div>
                <div class="card-body">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>User Role</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>
                                        @isset(auth()->user()->role->permission['permission']['usermanagement']['edit'])
                                            <a class="btn-info edit-icon" href="{{ route('user_edit_form',$user->id) }}"><i class="mdi mdi-table-edit"></i></a>
                                        @endisset

                                        @isset(auth()->user()->role->permission['permission']['usermanagement']['delete'])
                                            <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $user->id }}" href="#"><i class="mdi mdi-delete"></i></a>
                                        @endisset
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--delete modal code start -->
    <div id="softDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="{{ route('user_delete_form') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header modal_header_title">
                        <h5><i class="mdi mdi-gamepad-circle"></i> Confirm Message</h5>
                    </div>
                    <div class="modal-body modal_card">
                        <input type="hidden" name="modal_id" id="modal_id" />
                        Are you want to sure delete this data?
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect">Confirm</button>
                        <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection