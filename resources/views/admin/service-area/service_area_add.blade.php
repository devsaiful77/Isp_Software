@extends('layouts.admin')
@section('content')

    @isset(auth()->user()->role->permission['permission']['servicearea']['add'])
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header print_none">
                        <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Service Area Information</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('service_area_insert_form') }}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Service Area Name<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" name="serviceAreaName" class="form-control" placeholder="Name" value="{{ old('serviceAreaName') }}">
                                    @error('serviceAreaName')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Service Area Remarks<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" name="serviceAreaRemarks" class="form-control" placeholder="Remarks" value="{{ old('serviceAreaRemarks') }}">
                                    @error('serviceAreaRemarks')
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
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Service Area Information</h4>
                </div>
                <div class="card-body">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Service Area Name</th>
                                <th>Service Area Remarks</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($serviceAreas as $serviceArea)
                            <tr>
                                <td>{{ $serviceArea->serviceAreaName }}</td>
                                <td>{{ $serviceArea->serviceAreaRemarks }}</td>
                                <td>
                                    @isset(auth()->user()->role->permission['permission']['servicearea']['edit'])
                                        <a class="btn-info edit-icon" href="{{ route('service_area_edit_form',$serviceArea->serviceAreaId) }}"><i class="mdi mdi-table-edit"></i></a>
                                    @endisset

                                    @isset(auth()->user()->role->permission['permission']['servicearea']['delete'])
                                        <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $serviceArea->serviceAreaId }}" href="#"><i class="mdi mdi-delete"></i></a>
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
            <form method="post" action="{{ route('service_area_delete_form') }}">
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