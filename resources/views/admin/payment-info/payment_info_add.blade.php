@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline-info">
            <div class="card-header print_none">
                <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Payment Information</h4>
            </div>
            <div class="card-body">


            @isset(auth()->user()->role->permission['permission']['billcollection']['add'])
                <div class="searchBy">
                    <div class="row">
                        <div class="col-md-3">
                            <h2 class="text-right pt-4">Search By</h2>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="custom-control custom-radio">
                                        <input id="radio1" name="radio" type="radio" value="customer_name" checked class="custom-control-input">

                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Name</span>
                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input id="radio2" name="radio" type="radio" value="phone_no" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Phone Number</span>
                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input id="radio2" name="radio" type="radio" value="id" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Customer ID</span>
                                    </label>
                                    <div class="pt-2">
                                        <input class="form-control" placeholder="Search" type="text" name="customer_info" id="customer_info">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-items-center">
                            <button class="btn btn-info" onClick="searchEmployeeDetails()">Search</button>
                        </div><br>
                    </div>
                </div>

                <div id="showCustomerDetails" class="d-none">
                    <div class="row">
                        <div class="col-md-10">
                            <table class="table table-bordered table-striped table-hover custom_table">
                                <tr>
                                    <td>Customer ID:</td>
                                    <td><span id="show_customer_id" class="customer"></span> </td>
                                    <td>Name:</td>
                                    <td><span id="show_customer_name" class="customer"></span></td>
                                </tr>
                                <tr>
                                    <td>Address:</td>
                                    <td><span id="show_customer_address" class="customer"></span></td>
                                    <td>Phone Number:</td>
                                    <td><span id="show_customer_phoneNo1" class="customer"></span></td>
                                </tr>
                                <tr>
                                    <td>Amount:</td>
                                    <td><span id="show_customer_amount" class="customer"></span></td>
                                    <td>Connection Status:</td>
                                    <td><span id="show_customer_connection_status" class="customer"></span></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-2">
                            <img height="100" width="100" src="{{asset('uploads/company-profile/avatar.png')}}" />
                        </div>
                    </div>
                </div>

                <div class="mt-2">
                    <form action="{{ route('payment_insert_form') }}" method="POST" class="form-horizontal">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-7">
                                <input type="hidden" name="customerId" id="customer_id" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Collection Amount<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="amount" class="form-control" value="{{ old('amount') }}">
                                @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Payment Method<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <select class="form-control" name="paymentTypeId">
                                    <option value="1" selected>Hand Cash</option>
                                    <option value="2">Bkash</option>
                                    <option value="3">Bank</option>
                                </select>
                                @error('paymentTypeId')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Collection Date<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="date" name="paymentDate" class="form-control" value="{{ Date('Y-m-d') }}">
                                @error('paymentDate')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Collection By<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <select class="form-control" name="collectedById">
                                    <!-- <option value="">-- Select Collected Name --</option> -->
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('collectedById')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Pay Month<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <select class="form-control" name="payMonth">
                                    <option value="">-- Select Month --</option>
                                    @foreach($months as $month)
                                    <option value="{{ $month->month_id }}">{{ $month->month_name }}</option>
                                    @endforeach
                                </select>
                                @error('payMonth')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Pay Year<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <select class="form-control" name="payYear">
                                    <option value="{{date('Y')}}">{{date('Y')}}</option>
                                    @foreach(range(date('Y')+1, date('Y')-1) as $y)
                                    <option value="{{$y}}" {{$y}}>{{$y}}</option>
                                    @endforeach
                                </select>
                                @error('payYear')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info registration-btn">Save</button>
                        </div>
                    </form>
                </div>
            @endisset


                <div class="row pt-5">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header print_none">
                                <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Payment Information</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped table-hover custom_table">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Amount</th>
                                            <th>Payment Method</th>
                                            <th>Date</th>
                                            <th>Collected</th>
                                            <th>Month</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($payments as $payment)
                                        <tr>
                                            <td>{{ $payment->customer->customerName }}</td>
                                            <td>{{ $payment->amount }}</td>
                                            @if($payment->paymentTypeId == 1)
                                                <td>Hand Cash</td>
                                            @elseif($payment->paymentTypeId == 2)
                                                <td>Bkash</td>
                                            @elseif($payment->paymentTypeId == 3)
                                                <td>Bank</td>
                                            @endif
                                            <td>{{ $payment->paymentDate }}</td>
                                            <td>{{ $payment->user->name }}</td>
                                            <td>{{ $payment->month->month_name }}</td>
                                            <td>
                                                @isset(auth()->user()->role->permission['permission']['billcollection']['edit'])
                                                    <a class="btn-info edit-icon" href="{{ route('payment_edit_form',$payment->paymentId) }}"><i class="mdi mdi-table-edit"></i></a>
                                                @endisset
                                                @isset(auth()->user()->role->permission['permission']['billcollection']['delete'])
                                                    <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $payment->paymentId }}" href="#"><i class="mdi mdi-delete"></i></a>
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

<script type="text/javascript">
    /* ================= search Employee Details ================= */
    function searchEmployeeDetails() {
        var value_type = $(".custom-control-input:checked").val();
        var value = $("input[id='customer_info']").val();


        // alert('hhh');
        $.ajax({
            type: 'POST',
            url: "{{ route('search_customer_information') }}",
            data: {
                value: value,
                value_type: value_type
            },
            dataType: 'json',
            success: function(response) {




                if (response.status_code != 200) {

                    alert(response.status_code);
                    // $("input[id='emp_id_search']").val('');
                    // $("span[id='error_show']").text('This Id Dosn,t Match!');
                    // $("span[id='error_show']").addClass('d-block').removeClass('d-none');
                    // $("#showEmployeeDetails").addClass("d-none").removeClass("d-block");
                } else {
                    $("#showCustomerDetails").removeClass("d-none").addClass("d-block");
                    var customer = response.data[0]
                    // alert();
                    // $("input[id='emp_id_search']").val('');
                    // $("span[id='error_show']").removeClass('d-block').addClass('d-none');

                    $("input[id='customer_id']").val(customer.customerAutoId);

                    $("span[id='show_customer_id']").text(customer.customerID);
                    $("span[id='show_customer_name']").text(customer.customerName);
                    $("span[id='show_customer_phoneNo1']").text(customer.phoneNo1);
                    $("span[id='show_customer_amount']").text(customer.price);
                    $("span[id='show_customer_connection_status']").text(customer.connectionName);
                    var address = customer.description + ',' + customer.postCode + ',' + customer.roadNo +
                        ',' + customer.houseNo + ',' + customer.floorNo + ',' + customer.plateNo
                    $("span[id='show_customer_address']").text(address);

                    //  $request['description'],
                    // $request['postCode'],
                    // $request['roadNo'],
                    // $request['houseNo'],
                    // $request['floorNo'],
                    // $request['plateNo'],


                }
            }


        });
    }
</script>

@endsection