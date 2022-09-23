@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Daily Cost</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('dr_voucher_insert_form') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Dr Type<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <select class="form-control" name="drTypeId">
                                    <option value="">-- Select Dr Type --</option>
                                    @foreach($drTypes as $drType)
                                        <option value="{{ $drType->drTypeId }}">{{ $drType->drTypeName }}</option>
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
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
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
                                <input type="text" name="amount" class="form-control" placeholder="Amount" value="{{ old('amount') }}">
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Expense Date<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="date" name="expenseDate" class="form-control" placeholder="Expense Date" value="{{ date('Y-m-d') }}">
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
                                        <option value="{{ $month->month_id }}">{{ $month->month_name }}</option>
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
                                <input type="text" name="voucherNo" placeholder="Voucher No" class="form-control">
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




    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Daily Cost Information</h4>
                </div>
                <div class="card-body">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Expense By</th>
                                <th>Amount</th>
                                <th>Expense Date</th>
                                <th>Voucher No</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($drVouchers as $drVoucher)
                            <tr>
                                <td>{{ $drVoucher->user->name }}</td>
                                <td>{{ $drVoucher->amount }}</td>
                                <td>{{ $drVoucher->expenseDate }}</td>
                                <td>{{ $drVoucher->voucherNo }}</td>
                                <td>
                                    <a class="btn-info edit-icon" href="{{ route('dr_voucher_edit_form',$drVoucher->drVoucId) }}"><i class="mdi mdi-table-edit"></i></a>
                                    <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $drVoucher->drVoucId }}" href="#"><i class="mdi mdi-delete"></i></a>
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
            <form method="post" action="{{ route('dr_voucher_delete_form') }}">
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