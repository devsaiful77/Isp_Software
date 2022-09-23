@extends('layouts.admin')
@section('content')

    @isset(auth()->user()->role->permission['permission']['bandwithpurchase']['add'])
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header print_none">
                        <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Bandwith Purchase Information</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product_purchase_insert_form') }}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="row row-sm">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Total Bandwith (MBPS)<span class="require_star">*</span></label>
                                        <input type="text" name="total_bandwith" class="form-control" placeholder="Total Bandwith" value="{{ old('total_bandwith') }}">
                                        @error('total_bandwith')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Facebook Bandwith (MBPS)<span class="require_star">*</span></label>
                                        <input type="text" name="facebook_bandwith" class="form-control" placeholder="Facebook Bandwith" value="{{ old('facebook_bandwith') }}">
                                        @error('facebook_bandwith')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Youtube Bandwith (MBPS)<span class="require_star">*</span></label>
                                        <input type="text" name="youtube_bandwith" class="form-control" placeholder="Youtube Bandwith" value="{{ old('youtube_bandwith') }}">
                                        @error('youtube_bandwith')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Others Bandwith (MBPS)<span class="require_star">*</span></label>
                                        <input type="text" name="others_bandwith" class="form-control" placeholder="Others Bandwith" value="{{ old('others_bandwith') }}">
                                        @error('others_bandwith')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Total Amount<span class="require_star">*</span></label>
                                        <input type="text" name="total_amount" class="form-control" placeholder="Total Amount" value="{{ old('total_amount') }}">
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
                                                <option value="1">Link-3 Tech</option>
                                                <option value="2">Layer -3</option>
                                                <option value="3">Fiber @ home</option>
                                                <option value="4">Summit-1</option>
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
                                                <option value="{{ $month->month_id }}">{{ $month->month_name }}</option>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Paid Amount<span class="require_star">*</span></label>
                                        <input type="text" name="paid_amount" class="form-control" placeholder="Paid Amount" value="{{ old('paid_amount') }}">
                                        @error('paid_amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info registration-btn">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endisset




    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Bandwith Purchase Information</h4>
                </div>
                <div class="card-body">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Total Bandwith</th>
                                <th>Total Amount</th>
                                <th>Paid Amount</th>
                                <th>Month</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productPurchases as $productPurchase)
                            <tr>
                                <td>{{ $productPurchase->total_bandwith }}</td>
                                <td>{{ $productPurchase->total_amount }}</td>
                                <td>{{ $productPurchase->paid_amount }}</td>
                                <td>{{ $productPurchase->month->month_name }}</td>
                                <td>
                                    @isset(auth()->user()->role->permission['permission']['bandwithpurchase']['edit'])
                                        <a class="btn-info edit-icon" href="{{ route('product_purchase_edit_form',$productPurchase->productPurchase_id ) }}"><i class="mdi mdi-table-edit"></i></a>
                                    @endisset
                                    
                                    @isset(auth()->user()->role->permission['permission']['bandwithpurchase']['delete'])
                                        <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $productPurchase->productPurchase_id  }}" href="#"><i class="mdi mdi-delete"></i></a>
                                    @endisset
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
            <form method="post" action="{{ route('product_purchase_delete_form') }}">
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