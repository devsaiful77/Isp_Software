@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Other Income</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('other_income_insert_form') }}" method="POST" class="form-horizontal">
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
                            <label class="col-md-3 col-form-label text-right">Amount<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="amount" class="form-control" placeholder="Amount" value="{{ old('amount') }}">
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Date<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="date" name="date" class="form-control" placeholder="Date" value="{{ date('Y-m-d') }}">
                                @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>All Other Income Information</h4>
                </div>
                <div class="card-body">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Dr Type</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($otherIncomes as $otherIncome)
                            <tr>
                                <td>{{ $otherIncome->drVoucher->drTypeName }}</td>
                                <td>{{ $otherIncome->amount }}</td>
                                <td>{{ $otherIncome->date }}</td>
                                <td>
                                    <a class="btn-info edit-icon" href="{{ route('other_income_edit_form',$otherIncome->otherIncomeId) }}"><i class="mdi mdi-table-edit"></i></a>
                                    <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $otherIncome->otherIncomeId }}" href="#"><i class="mdi mdi-delete"></i></a>
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
            <form method="post" action="{{ route('other_income_delete_form') }}">
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