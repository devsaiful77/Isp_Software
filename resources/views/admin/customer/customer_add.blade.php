@extends('layouts.admin')
@section('content')

    @isset(auth()->user()->role->permission['permission']['addcustomer']['add'])
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header print_none">
                        <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Customer Information</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customer_insert_form') }}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="row row-sm">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Customer ID<span class="require_star">*</span></label>
                                        <input name="customerID" id="customerID" type="hidden"class="form-control" value="{{ $numberOfCustomer }}">
                                        <input type="text"class="form-control" value="{{ $numberOfCustomer }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Customer Name<span class="require_star">*</span></label>
                                        <input type="text" name="customerName" class="form-control" placeholder="Customer Name" value="{{ old('customerName') }}">
                                        @error('customerName')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Father Name</label>
                                        <input type="text" name="fatherName" class="form-control" placeholder="Father Name" value="{{ old('fatherName') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Email<span class="require_star">*</span></label>
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Application Date<span class="require_star">*</span></label>
                                        <input type="date" name="applicationDate" class="form-control" value="{{ date('Y-m-d') }}">
                                        @error('applicationDate')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Phone Number One<span class="require_star">*</span></label>
                                        <input type="text" name="phoneNo1" class="form-control" placeholder="Phone Number One" value="{{ old('phoneNo1') }}">
                                        @error('phoneNo1')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Phone Number Two</label>
                                        <input type="text" name="phoneNo2" class="form-control" placeholder="Phone Number Two" value="{{ old('phoneNo2') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Connection Date<span class="require_star">*</span></label>
                                        <input type="date" name="connectionDate" class="form-control" value="{{ date('Y-m-d') }}">
                                        @error('connectionDate')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Type Of Connection</label>
                                        <select class="form-control" name="type_of_connection_id">
                                                <option value="1">Wired</option>
                                                <option value="2">Wireless</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Type Of Connectivity</label>
                                        <select class="form-control" name="type_of_connectivity_id">
                                                <option value="1">Shared</option>
                                                <option value="2">Dedicated</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Connection Status<span class="require_star">*</span></label>
                                        <select class="form-control" name="connectionStatusId">
                                            @foreach($connectionStatus as $aConnectionStatus)
                                                <option value="{{ $aConnectionStatus->connectionStatusId }}">{{ $aConnectionStatus->connectionName }}</option>
                                            @endforeach
                                        </select>
                                        @error('connectionStatusId')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Customer Occupation<span class="require_star">*</span></label>
                                        <select class="form-control" name="customerOccupationId">
                                                <option value="1" selected>Public Job</option>
                                                <option value="2">Private Job</option>
                                                <option value="3">Business</option>
                                        </select>
                                        @error('customerOccupationId')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Service Type<span class="require_star">*</span></label>
                                        <select class="form-control" name="serviceTypeId">
                                                @foreach($serviceTypes as $serviceType)
                                                <option value="{{ $serviceType->serviceTypeId }}">{{ $serviceType->serviceName }}</option>
                                                @endforeach
                                        </select>
                                        @error('serviceTypeId')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Service Package<span class="require_star">*</span></label>
                                        <select class="form-control" name="packageId">
                                                @foreach($packageInformations as $packageInformation)
                                                <option value="{{ $packageInformation->packageId }}">{{ $packageInformation->packageName }}</option>
                                                @endforeach
                                        </select>
                                        @error('packageId')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Division<span class="require_star">*</span></label>
                                        <select class="form-control" name="divisionId">
                                                @foreach($divisions as $division)
                                                <option value="{{ $division->divisionId }}">{{ $division->divisionName }}</option>
                                                @endforeach
                                        </select>
                                        @error('divisionId')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">District<span class="require_star">*</span></label>
                                        <select class="form-control" name="districtId">
                                                @foreach($districts as $district)
                                                <option value="{{ $district->districtId }}">{{ $district->districtName }}</option>
                                                @endforeach
                                        </select>
                                        @error('districtId')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Upazila<span class="require_star">*</span></label>
                                        <select class="form-control" name="upazilaId">
                                            <option value="">-- Select Upazila --</option>
                                                @foreach($upazilas as $upazila)
                                                <option value="{{ $upazila->upazilaId }}">{{ $upazila->upazilaName }}</option>
                                                @endforeach
                                        </select>
                                        @error('upazilaId')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Union<span class="require_star">*</span></label>
                                        <select class="form-control" name="unionId">
                                            <option value="">-- Select Union --</option>
                                                @foreach($unions as $union)
                                                <option value="{{ $union->unionId }}">{{ $union->unionName }}</option>
                                                @endforeach
                                        </select>
                                        @error('unionId')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Service Area<span class="require_star">*</span></label>
                                        <select class="form-control" name="serviceAreaId">
                                            <option value="">-- Select Service Area --</option>
                                                @foreach($serviceAreas as $serviceArea)
                                                    <option value="{{ $serviceArea->serviceAreaId }}">{{ $serviceArea->serviceAreaName }}</option>
                                                @endforeach
                                        </select>
                                        @error('serviceAreaId')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Service Sub Area<span class="require_star">*</span></label>
                                        <select class="form-control" name="serviceSubAreaId">
                                            <option value="">-- Select Service Sub Area --</option>
                                                @foreach($serviceSubAreas as $serviceSubArea)
                                                    <option value="{{ $serviceSubArea->serviceSubAreaId }}">{{ $serviceSubArea->serviceSubAreaName }}</option>
                                                @endforeach
                                        </select>
                                        @error('serviceSubAreaId')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Pop Address<span class="require_star">*</span></label>
                                        <select class="form-control" name="pop_id">
                                            <option value="">-- Select Pop Address --</option>
                                                @foreach($popAddress as $aRecord)
                                                    <option value="{{ $aRecord->pop_id }}">{{ $aRecord->pop_name }}</option>
                                                @endforeach
                                        </select>
                                        @error('pop_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Description</label>
                                        <textarea name="description" class="form-control" id="" rows="1" placeholder="Description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Post Code</label>
                                        <input type="text" name="postCode" class="form-control" placeholder="Post Code" value="{{ old('postCode') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Road No</label>
                                        <input type="text" name="roadNo" class="form-control" placeholder="Road No" value="{{ old('roadNo') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">House No</label>
                                        <input type="text" name="houseNo" class="form-control" placeholder="Road No" value="{{ old('houseNo') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Floor No</label>
                                        <input type="text" name="floorNo" class="form-control" placeholder="Floor No" value="{{ old('floorNo') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Plate No</label>
                                        <input type="text" name="plateNo" class="form-control" placeholder="Plate No" value="{{ old('plateNo') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Nid</label>
                                        <input type="text" name="nid" class="form-control" placeholder="NID Number" value="{{ old('nid') }}">
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Photo<span class="require_star">*</span></label>
                                        <div class="col-md-6 pl-0">
                                            <input type="file" name="photo" onchange="mainThambUrl(this)"><br>
                                        </div>
                                        <img src="" alt="" id="mainThmb">
                                    </div>
                                </div> -->
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info registration-btn">Save</button>
                                    </div>
                                </div>
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
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Customer Information</h4>
                </div>
                <div class="card-body">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Customer ID</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->customerName }}</td>
                                <td>{{ $customer->customerID }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phoneNo1 }}</td>
                                <td>
                                    {{ $customer->upazila->upazilaName }},
                                    {{ $customer->union->unionName }},
                                    {{ $customer->roadNo }},
                                    {{ $customer->houseNo }}
                                </td>
                                <td>
                                    @isset(auth()->user()->role->permission['permission']['addcustomer']['edit'])
                                        <a class="btn-info edit-icon" href="{{ route('customer_edit_form',$customer->customerAutoId) }}"><i class="mdi mdi-table-edit"></i></a>
                                    @endisset

                                    @isset(auth()->user()->role->permission['permission']['addcustomer']['delete'])
                                        <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $customer->customerAutoId }}" href="#"><i class="mdi mdi-delete"></i></a>
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
            <form method="post" action="{{ route('customer_delete_form') }}">
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
