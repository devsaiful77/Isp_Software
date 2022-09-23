@extends('layouts.admin')
@section('content')

    @isset(auth()->user()->role->permission['permission']['banner']['add'])
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header print_none">
                        <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Banner Information</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('banner_insert_form') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Banner Name<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" name="bannerName" class="form-control" placeholder="Banner Name" value="{{ old('bannerName') }}">
                                    @error('bannerName')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Banner Title<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" name="bannerTitle" class="form-control" placeholder="Banner Title" value="{{ old('bannerTitle') }}">
                                    @error('bannerTitle')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Banner SubTitle<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" name="bannerSubTitle" class="form-control" placeholder="Banner SubTitle" value="{{ old('bannerSubTitle') }}">
                                    @error('bannerSubTitle')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Banner URL<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" name="bannerUrl" class="form-control" placeholder="Banner URL" value="{{ old('bannerUrl') }}">
                                    @error('bannerUrl')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Upload Imagr<span class="require_star">*</span></label>
                                <div class="col-md-7">
                                    <input type="file" name="bannerImage" class="form-control" placeholder="Banner URL" value="{{ old('bannerImage') }}">
                                    @error('bannerImage')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Banner Information</h4>
                </div>
                <div class="card-body">
                    
                    @if(Session::has('soft_success'))
                    <script type="text/javascript">
                        swal({title: "Success!", text: "Banner Softdelete Success!", icon: "success", button: "OK", timer:5000,});
                    </script>
                    @endif
                    @if(Session::has('soft_error'))
                    <script type="text/javascript">
                        swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
                    </script>
                    @endif
                    
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Title</th>
                                <th>SubTitle</th>
                                <th>URL</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($banners as $banner)
                                <tr>
                                    <td>{{ $banner->bannerName }}</td>
                                    <td>{{ $banner->bannerTitle }}</td>
                                    <td>{{ $banner->bannerSubTitle }}</td>
                                    <td>{{ $banner->bannerUrl }}</td>
                                    <td>
                                        @isset(auth()->user()->role->permission['permission']['banner']['edit'])
                                            <a class="btn-info edit-icon" href="{{ route('banner_edit_form',$banner->bannerId) }}"><i class="mdi mdi-table-edit"></i></a>
                                        @endisset

                                        @isset(auth()->user()->role->permission['permission']['banner']['delete'])
                                            <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $banner->bannerId }}" href="#"><i class="mdi mdi-delete"></i></a>
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
            <form method="post" action="{{ route('banner_delete_form') }}">
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