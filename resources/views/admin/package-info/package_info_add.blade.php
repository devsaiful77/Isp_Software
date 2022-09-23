@extends('layouts.admin')
@section('content')

    @isset(auth()->user()->role->permission['permission']['packageinformation']['add'])
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header print_none">
                        <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Package Information</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('package_info_insert_form') }}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 control-label col-form-label text-right">Service Type<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <select class="form-control" name="serviceTypeId">
                                        <option value="">-- Select Service Type --</option>
                                        @foreach($serviceTypes as $serviceType)
                                            <option value="{{ $serviceType->serviceTypeId }}">{{ $serviceType->serviceName }}</option>
                                        @endforeach
                                    </select>
                                    @error('serviceTypeId')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Service Name<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" name="packageName" class="form-control" placeholder="Package Name" value="{{ old('packageName') }}">
                                    @error('packageName')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Bandwidth<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" name="bandwidth" class="form-control" placeholder="Package Name" value="{{ old('bandwidth') }}">
                                    @error('bandwidth')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Price<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" name="price" class="form-control" placeholder="Package Name" value="{{ old('price') }}">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Package Code<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" name="packageCode" class="form-control" placeholder="Package Name" value="{{ old('packageCode') }}">
                                    @error('packageCode')
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
                                <th>Package Name</th>
                                <th>Service Type</th>
                                <th>Bandwidth</th>
                                <th>Price</th>
                                <th>Package Code</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($packageInformations as $packageInformation)
                            <tr>
                                <td>{{ $packageInformation->packageName }}</td>
                                <td>{{ $packageInformation->serviceType->serviceName }}</td>
                                <td>{{ $packageInformation->bandwidth }}</td>
                                <td>{{ $packageInformation->price }}</td>
                                <td>{{ $packageInformation->packageCode }}</td>
                                <td>
                                    @isset(auth()->user()->role->permission['permission']['packageinformation']['edit'])
                                        <a class="btn-info edit-icon" href="{{ route('package_info_edit_form',$packageInformation->packageId) }}"><i class="mdi mdi-table-edit"></i></a>
                                    @endisset

                                    @isset(auth()->user()->role->permission['permission']['packageinformation']['delete'])
                                        <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $packageInformation->packageId }}" href="#"><i class="mdi mdi-delete"></i></a>
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
            <form method="post" action="{{ route('package_info_delete_form') }}">
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