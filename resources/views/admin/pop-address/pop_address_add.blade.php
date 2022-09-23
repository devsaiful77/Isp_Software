@extends('layouts.admin')
@section('content')

    @isset(auth()->user()->role->permission['permission']['popinformation']['add'])
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header print_none">
                        <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Pop Address</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pop_address_insert_form') }}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Name<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" name="pop_name" class="form-control" placeholder="Name" value="{{ old('pop_name') }}">
                                    @error('pop_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Email</label>
                                <div class="col-md-7">
                                    <input type="email" name="pop_email" class="form-control" placeholder="Name" value="{{ old('pop_email') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Phone<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" name="pop_phone" class="form-control" placeholder="Name" value="{{ old('pop_phone') }}">
                                    @error('pop_phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Address</label>
                                <div class="col-md-7">
                                    <textarea name="pop_address" class="form-control" id="" placeholder="Address" rows="2"></textarea>
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
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Pop Address</h4>
                </div>
                <div class="card-body">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($popAddresses as $popAddress)
                            <tr>
                                <td>{{ $popAddress->pop_name }}</td>
                                <td>{{ $popAddress->pop_email }}</td>
                                <td>{{ $popAddress->pop_phone }}</td>
                                <td>{{ $popAddress->pop_address }}</td>
                                <td>
                                    @isset(auth()->user()->role->permission['permission']['popinformation']['edit'])
                                        <a class="btn-info edit-icon" href="{{ route('pop_address_edit_form',$popAddress->pop_id) }}"><i class="mdi mdi-table-edit"></i></a>
                                    @endisset
                                    @isset(auth()->user()->role->permission['permission']['popinformation']['delete'])
                                        <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $popAddress->pop_id }}" href="#"><i class="mdi mdi-delete"></i></a>
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
            <form method="post" action="{{ route('pop_address_delete_form') }}">
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