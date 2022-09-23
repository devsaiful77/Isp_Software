@extends('layouts.admin')
@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header print_none">
                <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> New Customer Information</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover custom_table">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Phone</th>
                            <th>Package</th>
                            <th>Address</th>
                            <th>Service</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->customerName }}</td>
                            <td>{{ $customer->phoneNo1 }}</td>
                            <td>{{ $customer->packageName }}</td>
                            <td>
                                {{ $customer->upazila->upazilaName }},
                                {{ $customer->union->unionName }},
                                {{ $customer->roadNo }},
                                {{ $customer->houseNo }}
                            </td>
                            <td>{{ $customer->serviceName }}</td>
                            <td>

                                <a class="btn-info edit-icon mb-2" href="#" data-toggle="modal" data-target="#exampleModal" data-id="{{ $customer->customerAutoId }}"><i class="mdi mdi-arrow-up-bold"></i></a>
                                <a class="btn-danger delete-icon" href="#" data-toggle="modal" data-target="#customerSoftDelModal" data-id="{{ $customer->customerAutoId }}"><i class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header print_none">
                <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Connection Information</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover custom_table">
                    <thead>
                        <tr>
                            <th> ID/Name</th>
                            <th> User IP</th>
                            <th> User ID</th>
                            <th> User Password</th>
                            <th>Remarks</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($connections as $connection)
                        <tr>
                            <td>{{$connection->customerId}}/{{ $connection->customerName }}</td>
                            <td>{{ $connection->ipAddress }}</td>
                            <td>{{ $connection->userId }}</td>
                            <td>{{ $connection->userPassword }}</td>
                            <td>{{ $connection->description }}</td>
                            <td>
                                <a class="btn-info edit-icon" href="{{ route('connection_edit_form',$connection->connectionId) }}"><i class="mdi mdi-table-edit"></i></a>
                                <!-- <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $connection->connectionId }}" href="#"><i class="mdi mdi-delete"></i></a> -->
                                <a class="btn-danger delete-icon" href="#" data-toggle="modal" data-target="#customerConnectionSoftDelModal" data-id="{{ $connection->connectionId }}"><i class="mdi mdi-delete"></i></a>


                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Approve Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('connection_insert_form') }}" method="POST" class="form-horizontal">
                    @csrf


                    <input type="hidden" id="customerAutoId" name="customerAutoId" value="">

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">ipAddress<span class="require_star">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="ipAddress" class="form-control" placeholder="IP Address" value="{{ old('ipAddress') }}">
                            @error('ipAddress')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">User Id<span class="require_star">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="userId" class="form-control" placeholder="userId" value="{{ old('userId') }}">
                            @error('userId')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">Password<span class="require_star">*</span></label>
                        <div class="col-md-7">
                            <input type="password" name="userPassword" class="form-control" placeholder="userPassword" value="{{ old('userPassword') }}">
                            @error('userPassword')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">Description</label>
                        <div class="col-md-7">
                            <input type="text" name="description" class="form-control" placeholder="description" value="{{ old('description') }}">
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

<!-- customer delete modal code start -->
<div id="customerSoftDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{ route('connection_delete_form') }}">
            @csrf
            <div class="modal-content">


                <div class="modal-header modal_header_title">
                    <h5><i class="mdi mdi-gamepad-circle"></i> Confirm Message</h5>
                </div>
                <div class="modal-body modal_card">
                    <input type="hidden" id="customerAutoId" name="customerAutoId" value="">

                    <input type="text" name="cust_delete_modal_id" id="cust_delete_modal_id" />
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




<!-- customer action status update modal code start -->
<div id="customerConnectionSoftDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{ route('connection_delete_form') }}">
            @csrf
            <div class="modal-content">


                <div class="modal-header modal_header_title">
                    <h5><i class="mdi mdi-gamepad-circle"></i> Confirm Message</h5>
                </div>
                <div class="modal-body modal_card">

                    <input type="hidden" name="connection_info_id" id="connection_info_id" />
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




<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready(function() {

        $('#exampleModal').on('shown.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var value = button.data('id');
            $('#customerAutoId').val(value);
        });



        // New Customer  delete

        $('#customerSoftDelModal').on('shown.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var value = button.data('id');
            // alert(value);
            $('#cust_delete_modal_id').val(value);
        });


        // User Active InActive 

        $('#customerConnectionSoftDelModal').on('shown.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var value = button.data('id');
            // alert(value);
            $('#connection_info_id').val(value);
        });
        customerConnectionSoftDelModal


    });
</script>


@endsection