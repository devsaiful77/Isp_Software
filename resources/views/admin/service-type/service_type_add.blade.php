@extends('layouts.admin')
@section('content')

    @isset(auth()->user()->role->permission['permission']['servicetype']['add'])
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header print_none">
                        <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Service Type Information</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('service_type_insert_form') }}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Service Type Name<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" name="serviceName" class="form-control" placeholder="Service Type Name" value="{{ old('serviceName') }}">
                                    @error('serviceName')
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
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Service Type Information</h4>
                </div>
                <div class="card-body">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Service Type Name</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($serviceTypes as $serviceType)
                            <tr>
                                <td>{{ $serviceType->serviceName }}</td>
                                <td>
                                    @isset(auth()->user()->role->permission['permission']['servicetype']['edit'])
                                        <a class="btn-info edit-icon" href="{{ route('service_type_edit_form',$serviceType->serviceTypeId) }}"><i class="mdi mdi-table-edit"></i></a>
                                    @endisset

                                    @isset(auth()->user()->role->permission['permission']['servicetype']['delete'])
                                        <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $serviceType->serviceTypeId }}" href="#"><i class="mdi mdi-delete"></i></a>
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
            <form method="post" action="{{ route('service_type_delete_form') }}">
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