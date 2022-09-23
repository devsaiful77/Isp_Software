@extends('layouts.admin')
@section('title')
    Edit Permissions
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Permissions </h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('permission_update_form') }}" class="form-horizontal">
                        @csrf

                        <input type="hidden" name="id" value="{{ $permission->id }}">

                        <div class="row">
                            <div class="col-md-3">
                               <div class="form-group">
                                    <label for="role">Select Role</label>
                                    <select class="form-control" name="role_id" id="role">
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" {{ ($permission->role_id == $role->id) ? 'selected':'' }}>{{ $role->name }}</option>
                                        @endforeach     
                                    </select>
                                    @error('role_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                               </div>

                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="table-responsive">
                                    <table class="table color-bordered-table red-bordered-table">
                                        <thead>
                                            <tr>
                                                <th>Permission</th>
                                                <th>Publish</th>
                                                <th>Add</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                <th>Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                            

                                            <tr>
                                                <td style="color:black;font-weight:600;">Company Profile</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[companyprofile][manage]" value="1" id="flexCheckDefault511" @isset($permission['permission']['companyprofile']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault511"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            

                                            <tr>
                                                <td style="color:black;font-weight:600;">Company Information</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[companyinformation][manage]" value="1" id="flexCheckDefault52" @isset($permission['permission']['companyinformation']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault52"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            

                                            

                                            <tr>
                                                <td style="color:black;font-weight:600;">Banner</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[banner][add]" value="1" id="flexCheckDefault13" @isset($permission['permission']['banner']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault13"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[banner][edit]" value="1" id="flexCheckDefault34" @isset($permission['permission']['banner']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault34"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[banner][delete]" value="1" id="flexCheckDefault45" @isset($permission['permission']['banner']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault45"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[banner][manage]" value="1" id="flexCheckDefault56" @isset($permission['permission']['banner']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault56"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            
                                            
                                            

                                            

                                            <tr>
                                                <td style="color:black;font-weight:600;">Offer Publish Website</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[offerpublishwebsite][publishoffer]" value="1" id="flexCheckDefault1377" @isset($permission['permission']['offerpublishwebsite']['publishoffer']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault1377"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[offerpublishwebsite][add]" value="1" id="flexCheckDefault1378" @isset($permission['permission']['offerpublishwebsite']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault1378"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[offerpublishwebsite][edit]" value="1" id="flexCheckDefault3489" @isset($permission['permission']['offerpublishwebsite']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault3489"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[offerpublishwebsite][delete]" value="1" id="flexCheckDefault45910" @isset($permission['permission']['offerpublishwebsite']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault45910"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[offerpublishwebsite][manage]" value="1" id="flexCheckDefault561011" @isset($permission['permission']['offerpublishwebsite']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault561011"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            
                                            
                                            

                                            

                                            <tr>
                                                <td style="color:black;font-weight:600;">General Setting</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[generalsetting][manage]" value="1" id="flexCheckDefault56101115" @isset($permission['permission']['generalsetting']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault56101115"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            

                                            <tr>
                                                <td style="color:black;font-weight:600;">Division</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[division][add]" value="1" id="flexCheckDefault137812" @isset($permission['permission']['division']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault137812"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[division][edit]" value="1" id="flexCheckDefault348913" @isset($permission['permission']['division']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault348913"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[division][delete]" value="1" id="flexCheckDefault4591014" @isset($permission['permission']['division']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault4591014"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[division][manage]" value="1" id="flexCheckDefault56101115219" @isset($permission['permission']['division']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault56101115219"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            

                                            <tr>
                                                <td style="color:black;font-weight:600;">District</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[district][add]" value="1" id="flexCheckDefault13781221" @isset($permission['permission']['district']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault13781221"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[district][edit]" value="1" id="flexCheckDefault34891322" @isset($permission['permission']['district']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault34891322"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[district][delete]" value="1" id="flexCheckDefault459101423" @isset($permission['permission']['district']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault459101423"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[district][manage]" value="1" id="flexCheckDefault5610111521924" @isset($permission['permission']['district']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault5610111521924"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            

                                            <tr>
                                                <td style="color:black;font-weight:600;">Upazila</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[upazila][add]" value="1" id="flexCheckDefault1378122125" @isset($permission['permission']['upazila']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault1378122125"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[upazila][edit]" value="1" id="flexCheckDefault3489132226" @isset($permission['permission']['upazila']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault3489132226"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[upazila][delete]" value="1" id="flexCheckDefault45910142327" @isset($permission['permission']['upazila']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault45910142327"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[upazila][manage]" value="1" id="flexCheckDefault561011152192428" @isset($permission['permission']['upazila']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault561011152192428"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            

                                            <tr>
                                                <td style="color:black;font-weight:600;">Union</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[union][add]" value="1" id="flexCheckDefault137812212529" @isset($permission['permission']['union']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault137812212529"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[union][edit]" value="1" id="flexCheckDefault348913222630" @isset($permission['permission']['union']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault348913222630"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[union][delete]" value="1" id="flexCheckDefault4591014232731" @isset($permission['permission']['union']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault4591014232731"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[union][manage]" value="1" id="flexCheckDefault56101115219242832" @isset($permission['permission']['union']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault56101115219242832"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            

                                            <tr>
                                                <td style="color:black;font-weight:600;">Add Connection Status</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[addconnectionstatus][add]" value="1" id="flexCheckDefault13781221252933" @isset($permission['permission']['addconnectionstatus']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault13781221252933"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[addconnectionstatus][edit]" value="1" id="flexCheckDefault34891322263034" @isset($permission['permission']['addconnectionstatus']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault34891322263034"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[addconnectionstatus][delete]" value="1" id="flexCheckDefault459101423273135" @isset($permission['permission']['addconnectionstatus']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault459101423273135"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[addconnectionstatus][manage]" value="1" id="flexCheckDefault5610111521924283236" @isset($permission['permission']['addconnectionstatus']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault5610111521924283236"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            

                                            <tr>
                                                <td style="color:black;font-weight:600;">Service Area</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicearea][add]" value="1" id="flexCheckDefault1378122125293337" @isset($permission['permission']['servicearea']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault1378122125293337"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicearea][edit]" value="1" id="flexCheckDefault3489132226303438" @isset($permission['permission']['servicearea']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault3489132226303438"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicearea][delete]" value="1" id="flexCheckDefault45910142327313539" @isset($permission['permission']['servicearea']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault45910142327313539"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicearea][manage]" value="1" id="flexCheckDefault561011152192428323640" @isset($permission['permission']['servicearea']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault561011152192428323640"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                            

                                            <tr>
                                                <td style="color:black;font-weight:600;">Service Sub Area</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicesubarea][add]" value="1" id="flexCheckDefault137812212529333741" @isset($permission['permission']['servicesubarea']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault137812212529333741"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicesubarea][edit]" value="1" id="flexCheckDefault348913222630343842" @isset($permission['permission']['servicesubarea']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault348913222630343842"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicesubarea][delete]" value="1" id="flexCheckDefault4591014232731353943" @isset($permission['permission']['servicesubarea']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault4591014232731353943"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicesubarea][manage]" value="1" id="flexCheckDefault56101115219242832364044" @isset($permission['permission']['servicesubarea']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault56101115219242832364044"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            



                                            <tr>
                                                <td style="color:black;font-weight:600;">Pop Information</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[popinformation][add]" value="1" id="flexCheckDefault13781221252933374145" @isset($permission['permission']['popinformation']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault13781221252933374145"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[popinformation][edit]" value="1" id="flexCheckDefault34891322263034384246" @isset($permission['permission']['popinformation']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault34891322263034384246"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[popinformation][delete]" value="1" id="flexCheckDefault459101423273135394347" @isset($permission['permission']['popinformation']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault459101423273135394347"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[popinformation][manage]" value="1" id="flexCheckDefault5610111521924283236404448" @isset($permission['permission']['popinformation']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault5610111521924283236404448"></label>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="color:black;font-weight:600;">Manage User</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[manageuser][manage]" value="1" id="flexCheckDefault561011152192428323640444849" @isset($permission['permission']['popinformation']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault561011152192428323640444849"></label>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="color:black;font-weight:600;">User</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[usermanagement][add]" value="1" id="flexCheckDefault1378122125293337414550" @isset($permission['permission']['usermanagement']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault1378122125293337414550"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[usermanagement][edit]" value="1" id="flexCheckDefault3489132226303438424651" @isset($permission['permission']['usermanagement']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault3489132226303438424651"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[usermanagement][delete]" value="1" id="flexCheckDefault45910142327313539434752" @isset($permission['permission']['usermanagement']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault45910142327313539434752"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[usermanagement][manage]" value="1" id="flexCheckDefault561011152192428323640444853" @isset($permission['permission']['usermanagement']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault561011152192428323640444853"></label>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="color:black;font-weight:600;">Role</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[rolemanagement][add]" value="1" id="flexCheckDefault137812212529333741455054" @isset($permission['permission']['rolemanagement']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault137812212529333741455054"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[rolemanagement][edit]" value="1" id="flexCheckDefault348913222630343842465155" @isset($permission['permission']['rolemanagement']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault348913222630343842465155"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[rolemanagement][delete]" value="1" id="flexCheckDefault4591014232731353943475256" @isset($permission['permission']['rolemanagement']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault4591014232731353943475256"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[rolemanagement][manage]" value="1" id="flexCheckDefault56101115219242832364044485357" @isset($permission['permission']['rolemanagement']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault56101115219242832364044485357"></label>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="color:black;font-weight:600;">Permission</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[permissionmanageuser][add]" value="1" id="flexCheckDefault13781221252933374145505458" @isset($permission['permission']['permissionmanageuser']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault13781221252933374145505458"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[permissionmanageuser][edit]" value="1" id="flexCheckDefault34891322263034384246515559" @isset($permission['permission']['permissionmanageuser']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault34891322263034384246515559"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[permissionmanageuser][delete]" value="1" id="flexCheckDefault459101423273135394347525660" @isset($permission['permission']['permissionmanageuser']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault459101423273135394347525660"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[permissionmanageuser][manage]" value="1" id="flexCheckDefault5610111521924283236404448535761" @isset($permission['permission']['permissionmanageuser']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexCheckDefault5610111521924283236404448535761"></label>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="color:black;font-weight:600;">Service Type</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicetype][add]" value="1" id="flexChec1" @isset($permission['permission']['servicetype']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec1"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicetype][edit]" value="1" id="flexChec2" @isset($permission['permission']['servicetype']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec2"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicetype][delete]" value="1" id="flexChec3" @isset($permission['permission']['servicetype']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec3"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicetype][manage]" value="1" id="flexChec4" @isset($permission['permission']['servicetype']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec4"></label>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="color:black;font-weight:600;">Package Information</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[packageinformation][add]" value="1" id="flexChec12" @isset($permission['permission']['packageinformation']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec12"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[packageinformation][edit]" value="1" id="flexChec23" @isset($permission['permission']['packageinformation']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec23"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[packageinformation][delete]" value="1" id="flexChec34" @isset($permission['permission']['packageinformation']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec34"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[packageinformation][manage]" value="1" id="flexChec45" @isset($permission['permission']['packageinformation']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec45"></label>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="color:black;font-weight:600;">Customer</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[customer][manage]" value="1" id="flexChec456" @isset($permission['permission']['customer']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec456"></label>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="color:black;font-weight:600;">Add Customer</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[addcustomer][add]" value="1" id="flexChec127" @isset($permission['permission']['addcustomer']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec127"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[addcustomer][edit]" value="1" id="flexChec238" @isset($permission['permission']['addcustomer']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec238"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[addcustomer][delete]" value="1" id="flexChec349" @isset($permission['permission']['addcustomer']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec349"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[addcustomer][manage]" value="1" id="flexChec4510" @isset($permission['permission']['addcustomer']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec4510"></label>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="color:black;font-weight:600;">New Customer Approval</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[newcustomerapproval][manage]" value="1" id="flexChec451014" @isset($permission['permission']['newcustomerapproval']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec451014"></label>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="color:black;font-weight:600;">Customer Status Update</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[customerstatusupdate][manage]" value="1" id="flexChec45101416" @isset($permission['permission']['customerstatusupdate']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec45101416"></label>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="color:black;font-weight:600;">Customer Bill</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[customerbill][manage]" value="1" id="flexChec4510141617" @isset($permission['permission']['customerbill']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec4510141617"></label>
                                                    </div>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td style="color:black;font-weight:600;">Bill Generate</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[billgenerate][manage]" value="1" id="flexChec451021" @isset($permission['permission']['billgenerate']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec451021"></label>
                                                    </div>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td style="color:black;font-weight:600;">Bill Collection</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[billcollection][add]" value="1" id="flexChec238192601" @isset($permission['permission']['billcollection']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec238192601"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[billcollection][edit]" value="1" id="flexChec2381926" @isset($permission['permission']['billcollection']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec2381926"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[billcollection][delete]" value="1" id="flexChec3492027" @isset($permission['permission']['billcollection']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec3492027"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[billcollection][manage]" value="1" id="flexChec45102128" @isset($permission['permission']['billcollection']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec45102128"></label>
                                                    </div>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td style="color:black;font-weight:600;">Reports</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[reports][manage]" value="1" id="flexChec451021284324" @isset($permission['permission']['reports']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec451021284324"></label>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="color:black;font-weight:600;">Bandwith Purchase</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[bandwithpurchase][add]" value="1" id="flexChec2381926011" @isset($permission['permission']['bandwithpurchase']['add']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec2381926011"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[bandwithpurchase][edit]" value="1" id="flexChec23819262" @isset($permission['permission']['bandwithpurchase']['edit']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec23819262"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[bandwithpurchase][delete]" value="1" id="flexChec34920273" @isset($permission['permission']['bandwithpurchase']['delete']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec34920273"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[bandwithpurchase][manage]" value="1" id="flexChec451021284" @isset($permission['permission']['bandwithpurchase']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec451021284"></label>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="color:black;font-weight:600;">Accounts</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[accounts][manage]" value="1" id="flexChec45102128402" @isset($permission['permission']['accounts']['manage']) checked @endisset>
                                                        <label class="form-check-label" for="flexChec45102128402"></label>
                                                    </div>
                                                </td>
                                            </tr>



                                            

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection