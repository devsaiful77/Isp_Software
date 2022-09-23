@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header print_none">
                <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Service Type Information</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('payment_update_form') }}" method="POST" class="form-horizontal">
                    @csrf

                    <input type="hidden" name="paymentId" value="{{ $payment->paymentId }}">

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">Customer ID<span class="require_star">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="customerId" id="customer_id" class="form-control" value="{{ $payment->customerId }}">
                            @error('customerId')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">Amount<span class="require_star">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="amount" class="form-control" value="{{ $payment->amount }}">
                            @error('amount')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">Payment Method<span class="require_star">*</span></label>
                        <div class="col-md-7">
                            <select class="form-control" name="paymentTypeId">
                                <option value="">-- Select Payment Method --</option>
                                <option value="1" {{ $payment->paymentTypeId == 1 ? 'selected' : '' }}>Hand Cash</option>
                                <option value="2" {{ $payment->paymentTypeId == 2 ? 'selected' : '' }}>Bkash</option>
                                <option value="3" {{ $payment->paymentTypeId == 3 ? 'selected' : '' }}>Bank</option>
                            </select>
                            @error('paymentTypeId')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">Payment Date<span class="require_star">*</span></label>
                        <div class="col-md-7">
                            <input type="date" name="paymentDate" class="form-control" value="{{ $payment->paymentDate }}">
                            @error('paymentDate')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right">Collected By Payment<span class="require_star">*</span></label>
                        <div class="col-md-7">
                            <select class="form-control" name="collectedById">
                                <option value="">-- Select Collected Name --</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $payment->collectedById ? 'selected': '' }}>{{ $user->name }}</option>
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
                                <option value="{{ $month->month_id }}" {{ $month->month_id == $payment->payMonth ? 'selected': '' }}>{{ $month->month_name }}</option>
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
                                <option value="{{$payment->payYear}}">{{$payment->payYear}}</option>
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
                        <button type="submit" class="btn btn-info registration-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection