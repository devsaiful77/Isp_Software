@extends('layouts.admin')
@section('title')
    Reports
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Date</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('report_payment_search_by_date') }}" target="_blank" method="POST">
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
        <div class="col-lg-4">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Month To Year</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('report_payment_search_by_month') }}" target="_blank" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Select Month</label>
                            <select class="form-control select2" name="payMonth" data-placeholder="Choose one" data-validation="required">
                                <option label="Choose Month"></option>
                                @foreach($months as $month)
                                    <option value="{{ $month->month_id }}">{{ $month->month_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Select Year</label>
                            <select class="form-control select2" name="payYear" data-placeholder="Choose one" data-validation="required">
                                <option value="{{date('Y')}}">{{date('Y')}}</option>
                                @foreach(range(date('Y'), date('Y')-5) as $y)
                                    <option value="{{$y}}" {{$y}} >{{$y}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Year</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('report_payment_search_by_year') }}" target="_blank" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Select Year</label>
                            <select class="form-control select2" name="payYear" data-placeholder="Choose one" data-validation="required">
                                <option value="{{date('Y')}}">{{date('Y')}}</option>
                                @foreach(range(date('Y'), date('Y')-5) as $y)
                                    <option value="{{$y}}" {{$y}} >{{$y}}</option>
                                @endforeach
                            </select>
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





