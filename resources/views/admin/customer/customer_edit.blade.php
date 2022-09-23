@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Customer Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('customer_update_form') }}" method="POST" class="form-horizontal">
                        @csrf

                        <input type="hidden" name="customerAutoId" value="{{ $customer->customerAutoId }}">

                        <div class="row row-sm">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Customer ID<span class="require_star">*</span></label>
                                    <input name="customerID" id="customerID" type="hidden"class="form-control" value="{{ $numberOfCustomer }}">
                                    <input type="text"class="form-control" value="{{ $customer->customerID }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Customer Name<span class="require_star">*</span></label>
                                    <input type="text" name="customerName" class="form-control" placeholder="Customer Name" value="{{ $customer->customerName }}">
                                    @error('customerName')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Father Name</label>
                                    <input type="text" name="fatherName" class="form-control" placeholder="Father Name" value="{{ $customer->fatherName }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Email<span class="require_star">*</span></label>
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $customer->email }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Application Date<span class="require_star">*</span></label>
                                    <input type="date" name="applicationDate" class="form-control" value="{{ $customer->applicationDate }}">
                                    @error('applicationDate')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Phone Number One<span class="require_star">*</span></label>
                                    <input type="text" name="phoneNo1" class="form-control" placeholder="Phone Number One" value="{{ $customer->phoneNo1 }}">
                                    @error('phoneNo1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Phone Number Two</label>
                                    <input type="text" name="phoneNo2" class="form-control" placeholder="Phone Number Two" value="{{ $customer->phoneNo2 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Connection Date<span class="require_star">*</span></label>
                                    <input type="date" name="connectionDate" class="form-control" value="{{ $customer->connectionDate }}">
                                    @error('connectionDate')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Type Of Connection</label>
                                    <select class="form-control" name="type_of_connection_id">
                                            <option value="1" {{ $customer->type_of_connection_id == 1 ? 'selected' : '' }}>Wired</option>
                                            <option value="2" {{ $customer->type_of_connection_id == 2 ? 'selected' : '' }}>Wireless</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Type Of Connectivity</label>
                                    <select class="form-control" name="type_of_connectivity_id">
                                            <option value="1" {{ $customer->type_of_connectivity_id == 1 ? 'selected' : '' }}>Shared</option>
                                            <option value="2" {{ $customer->type_of_connectivity_id == 2 ? 'selected' : '' }}>Dedicated</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Connection Status<span class="require_star">*</span></label>
                                    <select class="form-control" name="connectionStatusId">
                                        @foreach($connectionStatus as $aConnectionStatus)
                                            <option value="{{ $aConnectionStatus->connectionStatusId }}" {{ $aConnectionStatus->connectionStatusId == $customer->connectionStatusId ? 'selected': '' }}>{{ $aConnectionStatus->connectionName }}</option>
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
                                        <option value="">-- Select Occupation --</option>
                                            <option value="1" {{ $customer->customerOccupationId == 1 ? 'selected' : '' }}>Public Job</option>
                                            <option value="2" {{ $customer->customerOccupationId == 2 ? 'selected' : '' }}>Private Job</option>
                                            <option value="3" {{ $customer->customerOccupationId == 3 ? 'selected' : '' }}>Business</option>
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
                                        <option value="">-- Select Service Type --</option>
                                            @foreach($serviceTypes as $serviceType)
                                            <option value="{{ $serviceType->serviceTypeId }}" {{ $serviceType->serviceTypeId == $customer->serviceTypeId ? 'selected': '' }}>{{ $serviceType->serviceName }}</option>
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
                                        <option value="">-- Select Package --</option>
                                            @foreach($packageInformations as $packageInformation)
                                            <option value="{{ $packageInformation->packageId }}" {{ $packageInformation->packageId == $customer->packageId ? 'selected': '' }}>{{ $packageInformation->packageName }}</option>
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
                                        <option value="">-- Select Division --</option>
                                            @foreach($divisions as $division)
                                            <option value="{{ $division->divisionId }}" {{ $division->divisionId == $customer->divisionId ? 'selected': '' }}>{{ $division->divisionName }}</option>
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
                                        <option value="">-- Select District --</option>
                                            @foreach($districts as $district)
                                            <option value="{{ $district->districtId }}" {{ $district->districtId == $customer->districtId ? 'selected': '' }}>{{ $district->districtName }}</option>
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
                                            <option value="{{ $upazila->upazilaId }}" {{ $upazila->upazilaId == $customer->upazilaId ? 'selected': '' }}>{{ $upazila->upazilaName }}</option>
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
                                            <option value="{{ $union->unionId }}" {{ $union->unionId == $customer->unionId ? 'selected': '' }}>{{ $union->unionName }}</option>
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
                                                <option value="{{ $serviceArea->serviceAreaId }}" {{ $serviceArea->serviceAreaId == $customer->serviceAreaId ? 'selected': '' }}>{{ $serviceArea->serviceAreaName }}</option>
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
                                                <option value="{{ $serviceSubArea->serviceSubAreaId }}" {{ $serviceSubArea->serviceSubAreaId == $customer->serviceSubAreaId ? 'selected': '' }}>{{ $serviceSubArea->serviceSubAreaName }}</option>
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
                                                <option value="{{ $aRecord->pop_id }}" {{ $aRecord->pop_id == $customer->pop_id ? 'selected': '' }}>{{ $aRecord->pop_name }}</option>
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
                                    <textarea name="description" class="form-control" id="" rows="1" placeholder="Description">{{ $customer->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Post Code</label>
                                    <input type="text" name="postCode" class="form-control" placeholder="Post Code" value="{{ $customer->postCode }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Road No</label>
                                    <input type="text" name="roadNo" class="form-control" placeholder="Road No" value="{{ $customer->roadNo }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">House No</label>
                                    <input type="text" name="houseNo" class="form-control" placeholder="Road No" value="{{ $customer->houseNo }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Floor No</label>
                                    <input type="text" name="floorNo" class="form-control" placeholder="Floor No" value="{{ $customer->floorNo }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Plate No</label>
                                    <input type="text" name="plateNo" class="form-control" placeholder="Floor No" value="{{ $customer->plateNo }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Nid</label>
                                    <input type="text" name="nid" class="form-control" placeholder="NID Number" value="{{ $customer->nid }}">
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
                                    <button type="submit" class="btn btn-info registration-btn">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection