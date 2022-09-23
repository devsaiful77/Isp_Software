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
                <strong>Success</strong> Added New Customer Deivce Quotation
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
                        <form action="{{ route('customer.quotation.edit-submitted') }}" method="post">
                            @csrf

                            <div class="row">
                                {{-- Amount Section --}}
                                <div class="col-md-4">
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
                                {{-- Customer Information Section --}}
                                <div class="col-md-8">

                                    <div class="form-group row custom_form_group{{ $errors->has('quotationCustomerName') ? ' has-error' : '' }}">
                                        <label class="col-sm-4 control-label">Cus. Name<span class="require_star">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="hidden" name="cusQuotationId" class="form-control" value="{{ $quotation->cusQuotationId }}">

                                            <input type="text" name="quotationCustomerName" class="form-control" placeholder="Customer Name" value="{{ $quotation->cutomerName }}">
                                            @error('quotationCustomerName')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row custom_form_group{{ $errors->has('quotationCustomerName') ? ' has-error' : '' }}">
                                        <label class="col-sm-4 control-label">Mobile<span class="require_star">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="quoatationMobileNo" class="form-control" placeholder="Customer Mobile No" value="{{ $quotation->mobileNo }}">
                                            @error('quoatationMobileNo')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row custom_form_group{{ $errors->has('quotationCustomerName') ? ' has-error' : '' }}">
                                        <label class="col-sm-4 control-label">Package<span class="require_star">*</span></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="packageId">
                                                @foreach($packages as $apackage)
                                                <option value="{{ $apackage->packageId }}" {{ $apackage->packageId == $quotation->packageId ? 'selected': '' }}>{{ $apackage->packageName }}</option>

                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group row custom_form_group{{ $errors->has('quotationCustomerName') ? ' has-error' : '' }}">
                                        <label class="col-sm-4 control-label">Comments </label>
                                        <div class="col-sm-8">
                                            <input type="text" name="remarks" class="form-control" placeholder="Comments" value="{{ $quotation->remarks }}">

                                        </div>
                                    </div>





                                </div>
                            </div>
                            {{-- second row --}}

                            <div class="row">
                                <div class="col-md-8">

                                </div>
                                <div class="col-md-4">
                                    <div style="margin: 0; text-align:center">
                                        <button type="submit" class="btn btn-primary waves-effect">UPDATE</button>
                                    </div>
                                </div>

                            </div>


                        </form>
                    </div>
                </div>

            </div>
            {{-- Quotation Device List --}}
            <div class="row" style="margin-top:20px">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p>Device Records</p>
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
            {{-- List --}}
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
        // var PayAmount = parseFloat($('#NetAmount').val());
        // var CarryingBill = parseFloat($('#CarryingBill').val());
        // var Discount = parseFloat($('#discountpersent').val());


        // alert(Discount);
        // if (CarryingBill >= 0) {
        //   var total_amount = Math.round(PayAmount + CarryingBill - discount);
        //   $("#PayAmount").val('');
        //   $("#PayAmount").val(total_amount);

        // }
    }
</script>







@endsection