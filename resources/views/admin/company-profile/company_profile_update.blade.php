@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header print_none">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Company Profile Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('company_profile_update_form') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Name Bangla<span class="require_star">*</span></label>
                                    <input type="text" name="ComNameBangla" class="form-control" value="{{ $CompanyProfile->ComNameBangla }}">
                                    <input type="hidden" name="CompanyProfileId" value="{{ $CompanyProfile->CompanyProfileId }}">
                                    @error('ComNameBangla')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Name English<span class="require_star">*</span></label>
                                    <input type="text" name="ComNameEnlish" class="form-control" value="{{ $CompanyProfile->ComNameEnlish }}">
                                    @error('ComNameEnlish')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Company Title</label>
                                    <input type="text" name="CompanyTitle" class="form-control" value="{{ $CompanyProfile->CompanyTitle }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Company SubTitle</label>
                                    <input type="text" name="CompanySubTitle" class="form-control" value="{{ $CompanyProfile->CompanySubTitle }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Address<span class="require_star">*</span></label>
                                    <input type="text" name="Address" class="form-control" value="{{ $CompanyProfile->Address }}">
                                    @error('Address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Owner Name 1<span class="require_star">*</span></label>
                                    <input type="text" name="OwnerName1" class="form-control" value="{{ $CompanyProfile->OwnerName1 }}">
                                    @error('OwnerName1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Owner Name 2<span class="require_star">*</span></label>
                                    <input type="text" name="OwnerName2" class="form-control" value="{{ $CompanyProfile->OwnerName2 }}">
                                    @error('OwnerName2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Mobile No 1<span class="require_star">*</span></label>
                                    <input type="text" name="MobileNo1" class="form-control" value="{{ $CompanyProfile->MobileNo1 }}">
                                    @error('MobileNo1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Mobile No 2<span class="require_star">*</span></label>
                                    <input type="text" name="MobileNo2" class="form-control" value="{{ $CompanyProfile->MobileNo2 }}">
                                    @error('MobileNo2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Email 1<span class="require_star">*</span></label>
                                    <input type="text" name="Email1" class="form-control" value="{{ $CompanyProfile->Email1 }}">
                                    @error('Email1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Email 2<span class="require_star">*</span></label>
                                    <input type="text" name="Email2" class="form-control" value="{{ $CompanyProfile->Email2 }}">
                                    @error('Email2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Support Mobile Number<span class="require_star">*</span></label>
                                    <input type="text" name="SupportMobileNumber" class="form-control" value="{{ $CompanyProfile->SupportMobileNumber }}">
                                    @error('SupportMobileNumber')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Company Mission</label>
                                    <input type="text" name="CompanyMission" class="form-control" value="{{ $CompanyProfile->CompanyMission }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Company Vission</label>
                                    <input type="text" name="CompanyVission" class="form-control" value="{{ $CompanyProfile->CompanyVission }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Web Address<span class="require_star">*</span></label>
                                    <input type="text" name="WebAddress" class="form-control" value="{{ $CompanyProfile->WebAddress }}">
                                    @error('WebAddress')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Trade License</label>
                                    <input type="text" name="TradeLicense" class="form-control" value="{{ $CompanyProfile->TradeLicense }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">ISP License</label>
                                    <input type="text" name="ISPLicense" class="form-control" value="{{ $CompanyProfile->ISPLicense }}">
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Extra 1</label>
                                    <input type="text" name="Extra1" class="form-control" value="{{ $CompanyProfile->Extra1 }}">
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Extra 2</label>
                                    <input type="text" name="Extra2" class="form-control" value="{{ $CompanyProfile->Extra2 }}">
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Extra 3</label>
                                    <input type="text" name="Extra3" class="form-control" value="{{ $CompanyProfile->Extra3 }}">
                                </div>
                            </div>  
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Description</label>
                                    <textarea name="Description" id="" class="form-control" rows="5">{{ $CompanyProfile->Description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Owner Photo 1<span class="require_star">*</span></label>
                                    <div class="col-md-6 pl-0">
                                        <input type="file" name="OwnerPhoto1" onchange="mainThambUrl(this)"><br>
                                    </div>
                                    <div class="col-md-6 pl-0">
                                        @if($CompanyProfile->OwnerPhoto1!='')
                                            <img height="100" width="100" src="{{asset('uploads/company-profile/'.$CompanyProfile->OwnerPhoto1)}}" class="img-thumbail"/>
                                        @else
                                            <img height="100" width="100" src="{{asset('uploads/company-profile/avatar.png')}}"/>
                                        @endif
                                    </div>
                                    <img src="" alt="" id="mainThmb">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Owner Photo 2<span class="require_star">*</span></label>
                                    <div class="col-md-6 pl-0">
                                        <input type="file" name="OwnerPhoto2" onchange="mainThambUrl2(this)"><br>
                                    </div>
                                    <div class="col-md-6 pl-0">
                                        @if($CompanyProfile->OwnerPhoto2!='')
                                            <img height="100" width="100" src="{{asset('uploads/company-profile/'.$CompanyProfile->OwnerPhoto2)}}" class="img-thumbail"/>
                                        @else
                                            <img height="100" width="100" src="{{asset('uploads/company-profile/avatar.png')}}"/>
                                        @endif
                                    </div>
                                    <img src="" alt="" id="mainThmb2">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Logo</label>
                                    <div class="col-md-6 pl-0">
                                        <input type="file" name="Logo" onchange="mainThambUrl3(this)"><br>
                                    </div>
                                    <div class="col-md-6 pl-0">
                                        @if($CompanyProfile->Logo!='')
                                            <img height="100" width="100" src="{{asset('uploads/company-profile/'.$CompanyProfile->Logo)}}" class="img-thumbail"/>
                                        @else
                                            <img height="100" width="100" src="{{asset('uploads/company-profile/avatar.png')}}"/>
                                        @endif
                                    </div>
                                    <img src="" alt="" id="mainThmb3">
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