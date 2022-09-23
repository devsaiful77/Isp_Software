@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Other Income Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('other_income_update_form') }}" method="POST" class="form-horizontal">
                        @csrf

                        <input type="hidden" name="otherIncomeId" value="{{ $otherIncome->otherIncomeId }}">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Dr Type<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <select class="form-control" name="drTypeId">
                                    <option value="">-- Select Dr Type --</option>
                                    @foreach($drTypes as $drType)
                                        <option value="{{ $drType->drTypeId }}" {{ $drType->drTypeId == $otherIncome->drTypeId ? 'selected': '' }}>{{ $drType->drTypeName }}</option>
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
                                <input type="text" name="amount" class="form-control" value="{{ $otherIncome->amount }}">
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Date<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="date" name="date" class="form-control" value="{{ $otherIncome->date }}">
                                @error('date')
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