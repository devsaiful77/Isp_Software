@extends('layouts.admin')
@section('title')
    Reports
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Daly Cost</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('report_daily_cost_search') }}" target="_blank" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Select Date</label>
                            <input class="form-control" type="date" name="date" value="{{ date('Y-m-d') }}">
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





