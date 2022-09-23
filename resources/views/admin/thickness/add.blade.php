@extends('layouts.admin')
@section('content')
<!-- ########## START: MAIN PANEL ########## -->

  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="#">Starlight</a>
    <span class="breadcrumb-item active">Thickness</span>
  </nav>

  <div class="sl-pagebody">
    <!-- form -->
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-lg-8">
            <form class="form-horizontal" id="registration" method="post" action="{{ (@$data)?route('thickness.update') : route('thickness.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="card">
                  <div class="card-header">
                      <div class="row">
                          <div class="col-md-12">
                              <h3 class="card-title card_top_title">{{ (@$data)?'Update':'New' }} Thickness Information</h3>
                          </div>
                          <div class="clearfix"></div>
                      </div>
                  </div>
                  <div class="card-body card_form">

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-7">
                            @if(Session::has('success'))
                              <div class="alert alert-success alertsuccess" role="alert">
                                 <strong>Success!</strong> {{Session::get('success')}}
                              </div>
                            @endif
                            @if(Session::has('delete'))
                              <div class="alert alert-success alertsuccess" role="alert">
                                 <strong>Success!</strong> {{Session::get('delete')}}
                              </div>
                            @endif
                            @if(Session::has('error'))
                              <div class="alert alert-danger alerterror" role="alert">
                                 <strong>Opps!</strong> {{Session::get('error')}}
                              </div>
                            @endif
                        </div>
                        <div class="col-md-2"></div>
                    </div>

                    <div class="form-group row custom_form_group{{ $errors->has('CategoryID') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Category Name:<span class="req_star">*</span></label>
                        <div class="col-sm-7">
                          <select class="form-control" name="CategoryID" id="CateId_val">
                            <option value="">Select Category</option>
                            @foreach ($allCate as $cat)
                             <option value="{{ $cat->CateId }}" {{ (@$data->CateId==$cat->CateId)?'selected': '' }}>{{ $cat->CateName }}</option>
                            @endforeach
                          </select>
                          @if ($errors->has('CategoryID'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('CategoryID') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>

                    <div class="form-group row custom_form_group{{ $errors->has('BranID') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Brand Name:<span class="req_star">*</span></label>
                        <div class="col-sm-7">
                          <select class="form-control" name="BranID" id="BranId_val">
                            @if(@$data)
                            <option value="{{ @$data->BranId }}">{{ @$data->brandInfo->BranName }}</option>
                            @else
                            <option value="">Select Brand</option>
                            @endif
                          </select>
                          @if ($errors->has('BranID'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('BranID') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>

                    <div class="form-group row custom_form_group{{ $errors->has('SizeID') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Size Name:<span class="req_star">*</span></label>
                        <div class="col-sm-7">
                          <select class="form-control" name="SizeID" id="SizeId_val">
                            @if(@$data)
                            <option value="{{ @$data->SizeId }}">{{ @$data->sizeInfo->SizeName }}</option>
                            @else
                            <option value="">Select Size</option>
                            @endif
                          </select>
                          @if ($errors->has('SizeID'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('SizeID') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row custom_form_group{{ $errors->has('ThicName') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Thickness:<span class="req_star">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" placeholder="Brand Title" class="form-control" id="ThicName" name="ThicName" value="{{(@$data)?@$data->ThicName:old('ThicName')}}" required>
                          <input type="hidden" name="ThicId" value="{{@$data->ThicId ?? ''}}">
                          @if ($errors->has('ThicName'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('ThicName') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>

                  </div>
                  <div class="card-footer card_footer_button text-center">
                      <button type="submit" id="onSubmit" onclick="formValidation();" class="btn btn-primary waves-effect">{{ (@$data)?'UPDATE':'SAVE' }}</button>
                  </div>
              </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
    <!-- list -->
    <div class="row" style="margin-top:30px">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="card-title card_top_title"></i>Thickness List</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <!-- <table id="alltableinfo" class="table table-bordered custom_table mb-0"> -->
                                <table id="datatable1" class="table responsive mb-0">
                                    <thead>
                                        <tr>
                                            <th>SL NO.</th>
                                            <th>category</th>
                                            <th>Brand</th>
                                            <th>Size</th>
                                            <th>Thickness</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($allThickness as $key=>$thickness)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $thickness->cateInfo->CateName ??'' }}</td>
                                            <td>{{ $thickness->brandInfo->BranName ??'' }}</td>
                                            <td>{{ $thickness->sizeInfo->SizeName ??'' }}</td>
                                            <td>{{ $thickness->ThicName ??'' }}</td>
                                            <td>
                                                <a href="{{ route('thickness.edit',$thickness->ThicId) }}" title="edit"><i class="fa fa-pencil-square fa-lg edit_icon">Edit</i></a>
                                                <a href="{{ route('thickness.delete',$thickness->ThicId) }}" title="delete" id="delete"><i class="fa fa-trash fa-lg delete_icon"></i></a>
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
        </div>
    </div>
    <!-- end list -->
  </div>
  <!-- sl-pagebody -->
@endsection
