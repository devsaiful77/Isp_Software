@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Customer Connect & Desconnect</h4>
                </div>
                <div class="card-body">



                    <div class="searchBy">
                        <div class="row">
                            <div class="col-md-3">
                                <h2 class="text-right pt-4">Search By</h2>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="custom-control custom-radio">
                                            <input id="radio1" name="radio" type="radio"   value="customer_name" checked class="custom-control-input">

                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Name</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="radio2" name="radio" type="radio" value ="phone_no"  class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Phone Number</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="radio2" name="radio" type="radio" value ="id" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">ID</span>
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
                                        <td>ID:</td>
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
                                        <td>Connection Status:</td>
                                        <td><span id="show_customer_connection_status" class="customer"></span></td>
                                        <td colspan="3">Active</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-2">
                                <img height="100" width="100" src="{{asset('uploads/company-profile/avatar.png')}}"/>
                            </div>
                        </div>


                        <div class="row mt-4">
                            <div class="col-md-12">
                                <form action="{{ route('customer_connect_desconnect_update_form') }}" method="POST">

                                    @csrf
                                    <input type="hidden" name="customerAutoId," id="customer_auto_id">

                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-control-label float-right">Connection Status</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select class="form-control" name="connectionStatusId">
                                                    @foreach($connectionStatus as $aConnectionStatus)
                                                        <option value="{{ $aConnectionStatus->connectionStatusId }}">{{ $aConnectionStatus->connectionName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-info">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
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

            $("input[id='customer_auto_id']").val(customer.customerAutoId);

             $("span[id='show_customer_id']").text(customer.customerAutoId);
             $("span[id='show_customer_name']").text(customer.customerName);
             $("span[id='show_customer_phoneNo1']").text(customer.phoneNo1);
             var address = customer.description + ',' +customer.postCode + ',' +customer.roadNo
              + ',' +customer.houseNo+ ',' +customer.floorNo + ',' +customer.plateNo
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
