@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Division Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('dr_voucher_update_form') }}" method="POST" class="form-horizontal">
                        @csrf

                        <input type="hidden" name="drVoucId" value="{{ $drVoucher->drVoucId }}">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Dr Type<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <select class="form-control" name="drTypeId">
                                    <option value="">-- Select Dr Type --</option>
                                    @foreach($drTypes as $drType)
                                        <option value="{{ $drType->drTypeId }}" {{ $drType->drTypeId == $drVoucher->drTypeId ? 'selected': '' }}>{{ $drType->drTypeName }}</option>
                                    @endforeach
                                </select>
                                @error('drTypeId')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Expense By<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <select class="form-control" name="expenseById">
                                    <option value="">-- Select User List --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $user->id == $drVoucher->expenseById ? 'selected': '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('expenseById')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Amount<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="amount" class="form-control" value="{{ $drVoucher->amount }}">
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Expense Date<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="date" name="expenseDate" class="form-control" value="{{ $drVoucher->expenseDate }}">
                                @error('expenseDate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Year<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <select class="form-control" name="year">
                                    <option value="{{date('Y')}}" >{{date('Y')}}</option>
                                    @foreach(range(date('Y')+1, date('Y')-1) as $y)
                                        <option value="{{$y}}" {{$y}} >{{$y}}</option>
                                    @endforeach
                                </select>
                                @error('year')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Month<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <select class="form-control" name="monthId">
                                    <option value="">-- Select Month --</option>
                                    @foreach($months as $month)
                                        <option value="{{ $month->month_id }}" {{ $month->month_id == $drVoucher->monthId ? 'selected': '' }}>{{ $month->month_name }}</option>
                                    @endforeach
                                </select>
                                @error('monthId')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Voucher No</label>
                            <div class="col-md-7">
                                <input type="text" name="voucherNo" class="form-control" value="{{ $drVoucher->voucherNo }}">
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