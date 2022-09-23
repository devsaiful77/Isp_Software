@extends('layouts.admin')
@section('title')
Reports
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Customer List</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('customer_report_form_submit') }}" target="_blank" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Connection Status</label>
                        <select class="form-control" name="connectionStatusId">
                            <option value="0">All</option>
                            @foreach($connectionStatus as $aConnection)
                            <option value="{{ $aConnection->connectionStatusId }}">{{ $aConnection->connectionName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Package Name</label>
                        <select class="form-control" name="packageId">
                            <option value="0">All</option>
                            @foreach($packageList as $aRecord)
                            <option value="{{ $aRecord->packageId }}">{{ $aRecord->packageName }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info">Search</button>
                        <a href="{{ route('customer_excel') }}" class="btn btn-info">Excel</a>
                        <a href="{{ route('customer_csv') }}" class="btn btn-info">CSV</a>
                    </div>
                </form>
            </div>
        </div>


        <div class="card card-outline-info mt-5">
            <div class="card-header">
                <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>New Customer</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('customer_report_new_customer_form_submit') }}" target="_blank" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">From</label>
                        <input class="form-control" type="date" name="fromdate" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">To</label>
                        <input class="form-control" type="date" name="toDate" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection