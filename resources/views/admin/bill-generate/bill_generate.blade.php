@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Bill Generate</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('customer_bill_generate') }}"  method="POST" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Select Month</label>
                            <div class="col-md-7">
                                <select class="form-control" name="payMonth">
                                    <option value="{{ date('F') }}">{{ date('F') }}</option>
                                    @foreach($months as $month)
                                        <option value="{{ $month->month_id }}" {{ $month->month_id == Carbon\Carbon::now()->format('m') ? 'selected' :'' }}>{{ $month->month_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Connection Status</label>
                            <div class="col-md-7">
                                <select class="form-control" name="connectionStatusId">
                                    @foreach($connectionStatus as $aConnectionStatus)
                                        <option value="{{ $aConnectionStatus->connectionStatusId }}">{{ $aConnectionStatus->connectionName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info registration-btn">Process</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection