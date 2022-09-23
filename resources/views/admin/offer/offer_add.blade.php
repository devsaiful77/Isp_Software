@extends('layouts.admin')
@section('content')

    @isset(auth()->user()->role->permission['permission']['offerpublishwebsite']['add'])
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header print_none">
                        <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Offer Information</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('offer_insert_form') }}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Title<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Type</label>
                                <div class="col-md-7">
                                    <select class="form-control" name="type">
                                        <option value="">-- Select Type --</option>
                                        <option value="1">Photo</option>
                                        <option value="2">Video</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Url</label>
                                <div class="col-md-7">
                                    <input type="text" name="url" class="form-control" placeholder="Url" value="{{ old('url') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Date</label>
                                <div class="col-md-7">
                                    <input type="date" name="date" class="form-control" placeholder="Date" value="{{ date('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Remarks</label>
                                <div class="col-md-7">
                                    <input type="text" name="remarks" class="form-control" placeholder="Remarks" value="{{ old('remarks') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Description</label>
                                <div class="col-md-7">
                                    <textarea name="description" id="" class="form-control" rows="2" placeholder="Description"></textarea>
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
    @endisset




    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Offer Information</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>URL</th>
                                    <th>Date</th>
                                    <th>remarks</th>
                                    <th>description</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($offers as $offer)
                                <tr>
                                    <td>{!! Str::words($offer->title, 2, '..') !!}</td>
                                    @if($offer->type == 1)
                                        <td>Photo</td>
                                    @else
                                        <td>Video</td>
                                    @endif
                                    <td>{!! Str::limit($offer->url, 11, '..') !!}</td>
                                    <td>{{ $offer->date }}</td>
                                    <td>{{Str::words($offer->remarks,1)}}</td>
                                    <td>{!! Str::words($offer->description, 2, '..') !!}</td>
                                    <td>
                                        @isset(auth()->user()->role->permission['permission']['offerpublishwebsite']['edit'])
                                            <a class="btn-info edit-icon" href="{{ route('offer_edit_form',$offer->offer_id) }}"><i class="mdi mdi-table-edit"></i></a>
                                        @endisset
                                        
                                        @isset(auth()->user()->role->permission['permission']['offerpublishwebsite']['publishoffer'])
                                            @if($offer->status == 1)
                                                <a class="btn-success edit-icon" href="{{ route('offer_active_form',$offer->offer_id) }}"><i class="mdi mdi-arrow-up"></i></a>
                                            @else
                                                <a class="btn-warning edit-icon" href="{{ route('offer_inactive_form',$offer->offer_id) }}"><i class="mdi mdi-arrow-down"></i></a>
                                            @endif
                                        @endisset

                                        @isset(auth()->user()->role->permission['permission']['offerpublishwebsite']['delete'])
                                            <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $offer->offer_id }}" href="#"><i class="mdi mdi-delete"></i></a>
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
    </div>

    <!-- delete modal code start -->
    <div id="softDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('offer_delete_form') }}">
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