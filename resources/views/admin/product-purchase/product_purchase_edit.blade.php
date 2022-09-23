@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Service Type Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('product_purchase_update_form') }}" method="POST" class="form-horizontal">
                        @csrf

                        <input type="hidden" name="productPurchase_id" value="{{ $productPurchase->productPurchase_id }}">

                        <div class="row row-sm">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Total Bandwith (MBPS)<span class="require_star">*</span></label>
                                    <input type="text" name="total_bandwith" class="form-control" value="{{ $productPurchase->total_bandwith }}">
                                    @error('total_bandwith')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Facebook Bandwith (MBPS)<span class="require_star">*</span></label>
                                    <input type="text" name="facebook_bandwith" class="form-control" value="{{ $productPurchase->facebook_bandwith }}">
                                    @error('facebook_bandwith')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Youtube Bandwith (MBPS)<span class="require_star">*</span></label>
                                    <input type="text" name="youtube_bandwith" class="form-control" value="{{ $productPurchase->youtube_bandwith }}">
                                    @error('youtube_bandwith')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Others Bandwith (MBPS)<span class="require_star">*</span></label>
                                    <input type="text" name="others_bandwith" class="form-control" value="{{ $productPurchase->others_bandwith }}">
                                    @error('others_bandwith')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Total Amount<span class="require_star">*</span></label>
                                    <input type="text" name="total_amount" class="form-control" value="{{ $productPurchase->total_amount }}">
                                    @error('total_amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Purchase Form<span class="require_star">*</span></label>
                                    <select class="form-control" name="purchaseForm_id">
                                        <option value="">-- Select Purchase Form --</option>
                                            <option value="1" {{ $productPurchase->purchaseForm_id == 1 ? 'selected' : '' }}>Link-3 Tech</option>
                                            <option value="2" {{ $productPurchase->purchaseForm_id == 2 ? 'selected' : '' }}>Layer -3</option>
                                            <option value="3" {{ $productPurchase->purchaseForm_id == 3 ? 'selected' : '' }}>Fiber @ home</option>
                                            <option value="4" {{ $productPurchase->purchaseForm_id == 4 ? 'selected' : '' }}>Summit-1</option>
                                    </select>
                                    @error('purchaseForm_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Month<span class="require_star">*</span></label>
                                    <select class="form-control" name="month_id">
                                        <option value="">-- Select Month --</option>
                                        @foreach($months as $month)
                                            <option value="{{ $month->month_id }}" {{ $month->month_id == $productPurchase->month_id ? 'selected': '' }}>{{ $month->month_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('month_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Year<span class="require_star">*</span></label>
                                    <select class="form-control" name="year">
                                        @foreach($years as $year)
                                            <option value="{{ $year->productPurchase_id }}" >{{ $year->year }}</option>
                                        @endforeach
                                        @foreach(range(date('Y')+1, date('Y')-1) as $y)
                                            <option value="{{$y}}" {{$y}} >{{$y}}</option>
                                        @endforeach
                                    </select>
                                    @error('year')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Paid Amount<span class="require_star">*</span></label>
                                    <input type="text" name="paid_amount" class="form-control" value="{{ $productPurchase->paid_amount }}">
                                    @error('paid_amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info registration-btn">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection