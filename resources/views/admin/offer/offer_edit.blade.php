@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Offer Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('offer_update_form') }}" method="POST" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="offer_id" value="{{ $offer->offer_id }}">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Title<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="title" class="form-control" value="{{ $offer->title }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Type</label>
                            <div class="col-md-7">
                                <select class="form-control" name="type">
                                    <option value="1" {{ $offer->type == 1 ? 'selected' : '' }}>A</option>
                                    <option value="2" {{ $offer->type == 2 ? 'selected' : '' }}>B</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Url</label>
                            <div class="col-md-7">
                                <input type="text" name="url" class="form-control" value="{{ $offer->url }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Date</label>
                            <div class="col-md-7">
                                <input type="date" name="date" class="form-control" value="{{ $offer->date }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Remarks</label>
                            <div class="col-md-7">
                                <input type="text" name="remarks" class="form-control" value="{{ $offer->remarks }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Description</label>
                            <div class="col-md-7">
                                <textarea name="description" id="" class="form-control" rows="2"> {{ $offer->description }} </textarea>
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