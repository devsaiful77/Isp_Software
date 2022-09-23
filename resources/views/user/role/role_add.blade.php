@extends('layouts.admin')
@section('title')
    Add Role
@endsection
@section('content')

    @isset(auth()->user()->role->permission['permission']['rolemanagement']['add'])
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add New Role </h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('role_insert_form') }}" class="form-horizontal">
                            @csrf
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3"> Role Name<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info registration-btn">Save</button>
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
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Role Information</h4>
                </div>
                <div class="card-body">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @isset(auth()->user()->role->permission['permission']['rolemanagement']['edit'])
                                            <a class="btn-info edit-icon" href="{{ route('role_edit_form',$role->id ) }}"><i class="mdi mdi-table-edit"></i></a>
                                        @endisset

                                        @isset(auth()->user()->role->permission['permission']['rolemanagement']['delete'])
                                            <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $role->id  }}" href="#"><i class="mdi mdi-delete"></i></a>
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
            <form method="post" action="{{ route('role_delete_form') }}">
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





