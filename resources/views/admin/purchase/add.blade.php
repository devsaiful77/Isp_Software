@extends('layouts.admin')
@section('content')
<!-- ########## START: MAIN PANEL ########## -->

<div class="sl-pagebody">
  {{-- Response Massage --}}
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-7">
      @if(Session::has('success'))
      <div class="alert alert-success alertsuccess" role="alert">
        <strong>Success</strong> Added New Product
      </div>
      @endif
      @if(Session::has('error'))
      <div class="alert alert-danger alerterror" role="alert">
        <strong>Opps!</strong> {{Session::get('error')}}
      </div>
      @endif
    </div>
    <div class="col-md-2"></div>
  </div>
  {{-- Response Massage --}}
  <div class="card">
    <div class="card-body card_form">
      <div class="row">
        <div class="col-md-4">

          <div class="form-group row custom_form_group{{ $errors->has('CategoryID') ? ' has-error' : '' }}">
            <label class="col-sm-4 control-label">Category:<span class="req_star">*</span></label>
            <div class="col-sm-8">

              <!-- Device Category -->
              <select class="form-control" name="CategoryID">
                <option value="">Select Category</option>
                @foreach ($allCatg as $data)
                <option value="{{ $data->CateId }}">{{ $data->CateName }}</option>
                @endforeach
              </select>
              @if ($errors->has('CategoryID'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('CategoryID') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <!-- Sub Category -->
          <div class="form-group row custom_form_group{{ $errors->has('BranID') ? ' has-error' : '' }}">
            <label class="col-sm-4 control-label">Sub Category:<span class="req_star">*</span></label>
            <div class="col-sm-8">
              <select class="form-control" name="BranID" id="BranId_val">
                <option value="">Select Sub Category</option>
              </select>
              @if ($errors->has('BranID'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('BranID') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <!-- Device Brand -->
          <div class="form-group row custom_form_group{{ $errors->has('SizeID') ? ' has-error' : '' }}">
            <label class="col-sm-4 control-label">Brand:<span class="req_star">*</span></label>
            <div class="col-sm-8">

              <select class="form-control" name="SizeID" id="SizeId_val">
                <option value="">Select Brand</option>
              </select>
              @if ($errors->has('SizeID'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('SizeID') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <!-- Thickness -->
          <!-- <div class="form-group row custom_form_group{{ $errors->has('ThicID') ? ' has-error' : '' }}">
            <label class="col-sm-4 control-label">Thickness:<span class="req_star">*</span></label>
            <div class="col-sm-8">

              <select class="form-control" name="ThicID" id="ThicId_val">
                <option value="">Select Thickness</option>
              </select>
              @if ($errors->has('ThicID'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('ThicID') }}</strong>
              </span>
              @endif
            </div>
          </div> -->

          <div class="form-group row custom_form_group{{ $errors->has('UnitPrice') ? ' has-error' : '' }}">
            <label class="col-sm-4 control-label">Remakrs: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="remarks" placeholder="  Device Remarks">

            </div>
          </div>

          <div class="form-group row custom_form_group{{ $errors->has('UnitPrice') ? ' has-error' : '' }}">
            <label class="col-sm-4 control-label">Unit Price:<span class="req_star">*</span></label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="UnitPrice" placeholder="Input Amount">
              @if ($errors->has('UnitPrice'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('UnitPrice') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="form-group row custom_form_group{{ $errors->has('Qunatity') ? ' has-error' : '' }}">
            <label class="col-sm-4 control-label">Qunatity:<span class="req_star">*</span></label>
            <div class="col-sm-4">
              <input type="number" class="form-control" name="Qunatity" value="1">
              @if ($errors->has('Qunatity'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('Qunatity') }}</strong>
              </span>
              @endif
            </div>
            <div class="col-md-4">
              <button type="submit" class="btn btn-primary waves-effect" onclick="addToCartDevice()">Add To Cart</button>
            </div>
          </div>
        </div>

        {{-- Second Part --}}

        <div class="col-md-8">
          <div class="SecondPart">
            <form action="{{ route('product.purchase.store') }}" method="post">
              @csrf

              <div class="row">
                {{-- First Item --}}
                <div class="col-md-6">
                  <div class="form-group row custom_form_group{{ $errors->has('NetAmount') ? ' has-error' : '' }}">
                    <label class="col-sm-6 control-label">Net Amount:<span class="req_star">*</span></label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" id="NetAmount" name="NetAmount" required>
                      @if ($errors->has('NetAmount'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('NetAmount') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>



                  <div class="form-group row custom_form_group{{ $errors->has('CarryingBill') ? ' has-error' : '' }}">
                    <label class="col-sm-6 control-label">Other Cost:<span class="req_star">*</span></label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" id="CarryingBill" name="CarryingBill" value="0" onkeyup="CarryingBillCost()" required>
                      @if ($errors->has('CarryingBill'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('CarryingBill') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  {{-- hidden field --}}
                  <input type="hidden" id="temporaryField" value="">
                  <input type="hidden" id="temporaryField2" value="">
                  {{-- hidden field --}}
                  <div class="form-group row custom_form_group{{ $errors->has('Discount') ? ' has-error' : '' }}">
                    <label class="col-sm-6 control-label">Discount:<span class="req_star">*</span></label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" id="discountpersent" name="Discount" value="0" onkeyup="CarryingBillCost()" required>
                      @if ($errors->has('Discount'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('Discount') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row custom_form_group{{ $errors->has('PayAmount') ? ' has-error' : '' }}">
                    <label class="col-sm-6 control-label">Pay Amount:<span class="req_star">*</span></label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" id="PayAmount" name="PayAmount" required>
                      @if ($errors->has('PayAmount'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('PayAmount') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>



                </div>
                {{-- Second Item --}}
                <div class="col-md-6">

                  <div class="form-group row custom_form_group{{ $errors->has('doNO') ? ' has-error' : '' }}">
                    <label class="col-sm-5 control-label">Voucher No:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="doNO" value="{{ old('doNO') }}" placeholder="Input Voucher No">
                      @if ($errors->has('doNO'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('doNO') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>

                  <!-- <div class="form-group row custom_form_group{{ $errors->has('TruckNo') ? ' has-error' : '' }}">
                    <label class="col-sm-5 control-label">Truck No:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="TruckNo" value="{{ old('TruckNo') }}" placeholder="Input Truck No">
                      @if ($errors->has('TruckNo'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('TruckNo') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div> -->

                  <div class="form-group row custom_form_group{{ $errors->has('PurchaseDate') ? ' has-error' : '' }}">
                    <label class="col-sm-5 control-label">Purchase Date:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" id="datepicker" class="form-control" name="PurchaseDate" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::now()))}}">
                      @if ($errors->has('PurchaseDate'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('PurchaseDate') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>

                  <!-- <div class="form-group row custom_form_group{{ $errors->has('VendorName') ? ' has-error' : '' }}">
                    <label class="col-sm-5 control-label">Vendor Name:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <select class="form-control" name="VendorName" id="VendorName">
                        <option value="">Select Vendor </option>

                      </select>
                      @if ($errors->has('VendorName'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('VendorName') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div> -->

                </div>
              </div>
              {{-- second row --}}

              <div class="row">
                <div class="col-md-12">
                  <div style="margin: 0; text-align:center">
                    <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
                  </div>
                </div>

              </div>
            </form>
          </div>
        </div>

      </div>
      {{-- Order Wise Product List --}}
      <div class="row" style="margin-top:20px">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <p>Order List</p>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="" class="table table-bordered responsive mb-0">
                      <thead>
                        <tr>
                          <th>Category</th>
                          <th>Sub Category</th>
                          <th>Brand</th>
                          <th>Description</th>
                          <th>Price & Qty</th>
                          <th>Amount</th>
                          <th>Manage</th>
                        </tr>
                      </thead>
                      <tbody id="addToCartOrderList">

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- Order List --}}
    </div>

  </div>



  <div class="row">
    <div class="col-lg-12">
      <div class="card card-outline-info">
        <div class="card-header print_none">
          <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Device Purchase Records</h4>
        </div>
        <div class="card-body">
          <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
            <thead>
              <tr>
                <th>S.N</th>
                <th>Purchase Date</th>
                <th>Vourcher No</th>
                <th>Discount</th>
                <th>Total Amount</th>
                <th>Manage</th>
              </tr>
            </thead>

            <tbody>
              @php
              $sl = 1;
              @endphp
              @foreach($purchaseRecord as $record)
              <tr>
                <td>{{ $sl++ }}</td>

                <td>{{ $record->PurchaseDate }}</td>
                <td>{{ $record->DoNo }}</td>
                <td>{{ $record->Discount }}</td>
                <td>{{ $record->TotalPrice }}</td>
                <td>
                  <a class="btn-info edit-icon" href="{{ route('product_purchase_edit_form',$record->ProdPurcId ) }}"><i class="mdi mdi-table-edit"></i></a>

                  <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $record->ProdPurcId  }}" href="#"><i class="mdi mdi-delete"></i></a>
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



{{-- script --}}

<script type="text/javascript">
  $(document).ready(function() {


  })
</script>


<script type="text/javascript">
  // Attend Labour Cost

  // Carrying Bill
  function CarryingBillCost() {
    var PayAmount = parseFloat($('#NetAmount').val());
    var CarryingBill = parseFloat($('#CarryingBill').val());
    var Discount = parseFloat($('#discountpersent').val());


    alert(Discount);
    if (CarryingBill >= 0) {
      var total_amount = Math.round(PayAmount + CarryingBill - discount);
      $("#PayAmount").val('');
      $("#PayAmount").val(total_amount);

    }
  }

  // Carrying Bill
  function DiscountAmount() {
    var totalamnt = parseFloat($('#NetAmount').val());
    var Discount = parseFloat($('#discountpersent').val());
    var CarryingBill = parseFloat($('#CarryingBill').val());

    if (Discount > 0) {
      var total_amount = (totalamnt - Discount);
      $("#PayAmount").val('');
      $("#PayAmount").val(total_amount);
    }
  }
</script>







@endsection