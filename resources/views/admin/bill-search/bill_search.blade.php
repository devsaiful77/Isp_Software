@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline-info">
            <div class="card-header print_none">
                <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Customer Bill Search</h4>
            </div>
            <div class="card-body">

                <form action="{{ route('customer_bill_search') }}"  method="POST" class="form-horizontal">
                    @csrf

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label">Pop Address<span class="require_star">*</span></label>
                                <select class="form-control" name="pop_id">
                                    <option value="">-- Select Pop Address --</option>
                                    @foreach($popAddress as $aRecord)
                                        <option value="{{ $aRecord->pop_id }}">{{ $aRecord->pop_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label">Sub Area<span class="require_star">*</span></label>
                                <select class="form-control" name="serviceSubAreaId">
                                    <option value="">-- Select Sub Area --</option>
                                    @foreach($serviceSubAreas as $aRecord)
                                        <option value="{{ $aRecord->serviceSubAreaId }}">{{ $aRecord->serviceSubAreaName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label">Seller<span class="require_star">*</span></label>
                                <select class="form-control" name="seller_id">
                                    <option value="">-- Select Seller --</option>
                                    @foreach($users as $aRecord)
                                        <option value="{{ $aRecord->id }}">{{ $aRecord->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label">Month<span class="require_star">*</span></label>
                                <select class="form-control" name="month_id">
                                    <option value="">-- Select month --</option>
                                    @foreach($months as $aRecord)
                                        <option value="{{ $aRecord->month_id }}">{{ $aRecord->month_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="submit" class="btn btn-info registration-btn">Process</button>
                            </div>
                        </div>
                    </div>
                </form>





                <div class="row pt-5">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header print_none">
                                <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Customer Bill</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped table-hover custom_table">
                                    <thead>
                                        <tr>
                                            <th>Customer ID</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Month</th>
                                            <th>Amount</th>
                                            <th>P Amount</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($billSearch as $aRecord)
                                            <tr>
                                                <td>{{ $aRecord->customerID }}</td>
                                                <td>{{ $aRecord->customerName }}</td>
                                                <td>{{ $aRecord->roadNo,$aRecord->houseNo,$aRecord->floorNo,$aRecord->plateNo }}</td>
                                                <td>{{ $aRecord->phoneNo1 }}</td>
                                                <td>{{ $aRecord->month_name }}</td>
                                                <td>{{ $aRecord->bill_amount }}</td>
                                                <td>{{ $aRecord->amount }}</td>
                                                <td>
                                                    <a class="btn btn-info" href="{{ route('customer_bill_pay') }}">Pay</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>

<!--delete modal code start -->
<div id="softDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{ route('payment_delete_form') }}">
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