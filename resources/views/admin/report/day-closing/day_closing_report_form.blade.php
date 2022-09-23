@extends('layouts.admin')
@section('title')
Reports
@endsection
@section('content')
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Day Closing</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('day_closing_report_process') }}" target="_blank" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <label class="custom-control custom-radio">
                                    <input id="rd_details" name="rd_details" type="checkbox" value="1" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Report Details</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">From Date</label>
                                <input class="form-control" type="date" name="fromDate" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">To Date</label>
                                <input class="form-control" type="date" name="toDate" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="text-center">
                                <button type="submit" class="btn btn-info">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>
@endsection