@extends('layouts.admin')
@section('title')
    Add Permissions
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add New Permissions </h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('permission_insert_form') }}" class="form-horizontal">
                        @csrf

                        <div class="row">
                            <div class="col-md-3">
                               <div class="form-group">
                                    <label for="role">Select Role<span class="require_star">*</span></label>
                                    <select class="form-control" name="role_id" id="role">
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                               </div>

                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info">Create</button>
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
                                                        <input class="form-check-input" type="checkbox" name="permission[companyprofile][manage]" value="1" id="flexCheckDefault651">
                                                        <label class="form-check-label" for="flexCheckDefault651"></label>
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
                                                        <input class="form-check-input" type="checkbox" name="permission[companyinformation][manage]" value="1" id="flexCheckDefault652">
                                                        <label class="form-check-label" for="flexCheckDefault652"></label>
                                                    </div>
                                                </td>
                                            </tr>




                                            <tr>
                                                <td style="color:black;font-weight:600;">Banner</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[banner][add]" value="1" id="flexCheckDefault613">
                                                        <label class="form-check-label" for="flexCheckDefault613"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[banner][edit]" value="1" id="flexCheckDefault634">
                                                        <label class="form-check-label" for="flexCheckDefault634"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[banner][delete]" value="1" id="flexCheckDefault645">
                                                        <label class="form-check-label" for="flexCheckDefault645"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[banner][manage]" value="1" id="flexCheckDefault656">
                                                        <label class="form-check-label" for="flexCheckDefault656"></label>
                                                    </div>
                                                </td>
                                            </tr>





                                            <tr>
                                                <td style="color:black;font-weight:600;">Offer Publish Website</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[offerpublishwebsite][publishoffer]" value="1" id="flexCheckDefault6177">
                                                        <label class="form-check-label" for="flexCheckDefault6177"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[offerpublishwebsite][add]" value="1" id="flexCheckDefault6178">
                                                        <label class="form-check-label" for="flexCheckDefault6178"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[offerpublishwebsite][edit]" value="1" id="flexCheckDefault6389">
                                                        <label class="form-check-label" for="flexCheckDefault6389"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[offerpublishwebsite][delete]" value="1" id="flexCheckDefault64910">
                                                        <label class="form-check-label" for="flexCheckDefault64910"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[offerpublishwebsite][manage]" value="1" id="flexCheckDefault651011">
                                                        <label class="form-check-label" for="flexCheckDefault651011"></label>
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
                                                        <input class="form-check-input" type="checkbox" name="permission[generalsetting][manage]" value="1" id="flexCheckDefault65101115">
                                                        <label class="form-check-label" for="flexCheckDefault65101115"></label>
                                                    </div>
                                                </td>
                                            </tr>





                                            <tr>
                                                <td style="color:black;font-weight:600;">Division</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[division][add]" value="1" id="flexCheckDefault61781216">
                                                        <label class="form-check-label" for="flexCheckDefault61781216"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[division][edit]" value="1" id="flexCheckDefault63891317">
                                                        <label class="form-check-label" for="flexCheckDefault63891317"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[division][delete]" value="1" id="flexCheckDefault649101418">
                                                        <label class="form-check-label" for="flexCheckDefault649101418"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[division][manage]" value="1" id="flexCheckDefault6510111519">
                                                        <label class="form-check-label" for="flexCheckDefault6510111519"></label>
                                                    </div>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td style="color:black;font-weight:600;">District</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[district][add]" value="1" id="flexCheckDefault6178121621">
                                                        <label class="form-check-label" for="flexCheckDefault6178121621"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[district][edit]" value="1" id="flexCheckDefault6389131722">
                                                        <label class="form-check-label" for="flexCheckDefault6389131722"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[district][delete]" value="1" id="flexCheckDefault64910141823">
                                                        <label class="form-check-label" for="flexCheckDefault64910141823"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[district][manage]" value="1" id="flexCheckDefault651011151924">
                                                        <label class="form-check-label" for="flexCheckDefault651011151924"></label>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="color:black;font-weight:600;">Upazila</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[upazila][add]" value="1" id="flexCheckDefault617812162125">
                                                        <label class="form-check-label" for="flexCheckDefault617812162125"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[upazila][edit]" value="1" id="flexCheckDefault638913172226">
                                                        <label class="form-check-label" for="flexCheckDefault638913172226"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[upazila][delete]" value="1" id="flexCheckDefault6491014182327">
                                                        <label class="form-check-label" for="flexCheckDefault6491014182327"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[upazila][manage]" value="1" id="flexCheckDefault65101115192428">
                                                        <label class="form-check-label" for="flexCheckDefault65101115192428"></label>
                                                    </div>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td style="color:black;font-weight:600;">Union</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[union][add]" value="1" id="flexCheckDefault61781216212529">
                                                        <label class="form-check-label" for="flexCheckDefault61781216212529"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[union][edit]" value="1" id="flexCheckDefault63891317222630">
                                                        <label class="form-check-label" for="flexCheckDefault63891317222630"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[union][delete]" value="1" id="flexCheckDefault649101418232731">
                                                        <label class="form-check-label" for="flexCheckDefault649101418232731"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[union][manage]" value="1" id="flexCheckDefault6510111519242832">
                                                        <label class="form-check-label" for="flexCheckDefault6510111519242832"></label>
                                                    </div>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td style="color:black;font-weight:600;">Add Connection Status</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[addconnectionstatus][add]" value="1" id="flexCheckDefault617812162125293233">
                                                        <label class="form-check-label" for="flexCheckDefault617812162125293233"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[addconnectionstatus][edit]" value="1" id="flexCheckDefault63891317222630334">
                                                        <label class="form-check-label" for="flexCheckDefault63891317222630334"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[addconnectionstatus][delete]" value="1" id="flexCheckDefault64910141823273135">
                                                        <label class="form-check-label" for="flexCheckDefault64910141823273135"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[addconnectionstatus][manage]" value="1" id="flexCheckDefault651011151924283236">
                                                        <label class="form-check-label" for="flexCheckDefault651011151924283236"></label>
                                                    </div>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td style="color:black;font-weight:600;">Service Area</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicearea][add]" value="1" id="flexCheckDefault61781216212529323337">
                                                        <label class="form-check-label" for="flexCheckDefault61781216212529323337"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicearea][edit]" value="1" id="flexCheckDefault6389131722263033438">
                                                        <label class="form-check-label" for="flexCheckDefault6389131722263033438"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicearea][delete]" value="1" id="flexCheckDefault6491014182327313539">
                                                        <label class="form-check-label" for="flexCheckDefault6491014182327313539"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicearea][manage]" value="1" id="flexCheckDefault65101115192428323640">
                                                        <label class="form-check-label" for="flexCheckDefault65101115192428323640"></label>
                                                    </div>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td style="color:black;font-weight:600;">Service Sub Area</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicesubarea][add]" value="1" id="flexCheckDefault6178121621252932333741">
                                                        <label class="form-check-label" for="flexCheckDefault6178121621252932333741"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicesubarea][edit]" value="1" id="flexCheckDefault638913172226303343842">
                                                        <label class="form-check-label" for="flexCheckDefault638913172226303343842"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicesubarea][delete]" value="1" id="flexCheckDefault649101418232731353943">
                                                        <label class="form-check-label" for="flexCheckDefault649101418232731353943"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicesubarea][manage]" value="1" id="flexCheckDefault6510111519242832364044">
                                                        <label class="form-check-label" for="flexCheckDefault6510111519242832364044"></label>
                                                    </div>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td style="color:black;font-weight:600;">Pop Information</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[popinformation][add]" value="1" id="flexCheckDefault617812162125293233374145">
                                                        <label class="form-check-label" for="flexCheckDefault617812162125293233374145"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[popinformation][edit]" value="1" id="flexCheckDefault63891317222630334384246">
                                                        <label class="form-check-label" for="flexCheckDefault63891317222630334384246"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[popinformation][delete]" value="1" id="flexCheckDefault64910141823273135394347">
                                                        <label class="form-check-label" for="flexCheckDefault64910141823273135394347"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[popinformation][manage]" value="1" id="flexCheckDefault651011151924283236404447">
                                                        <label class="form-check-label" for="flexCheckDefault651011151924283236404447"></label>
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
                                                        <input class="form-check-input" type="checkbox" name="permission[manageuser][manage]" value="1" id="flexCheckDefault65101115192428323640444751000">
                                                        <label class="form-check-label" for="flexCheckDefault65101115192428323640444751000"></label>
                                                    </div>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td style="color:black;font-weight:600;">User</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[usermanagement][add]" value="1" id="flexCheckDefault61781216212529323337414548">
                                                        <label class="form-check-label" for="flexCheckDefault61781216212529323337414548"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[usermanagement][edit]" value="1" id="flexCheckDefault6389131722263033438424649">
                                                        <label class="form-check-label" for="flexCheckDefault6389131722263033438424649"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[usermanagement][delete]" value="1" id="flexCheckDefault6491014182327313539434750">
                                                        <label class="form-check-label" for="flexCheckDefault6491014182327313539434750"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[usermanagement][manage]" value="1" id="flexCheckDefault65101115192428323640444751">
                                                        <label class="form-check-label" for="flexCheckDefault65101115192428323640444751"></label>
                                                    </div>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td style="color:black;font-weight:600;">Role</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[rolemanagement][add]" value="1" id="flexCheckDefault6178121621252932333741454852">
                                                        <label class="form-check-label" for="flexCheckDefault6178121621252932333741454852"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[rolemanagement][edit]" value="1" id="flexCheckDefault638913172226303343842464953">
                                                        <label class="form-check-label" for="flexCheckDefault638913172226303343842464953"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[rolemanagement][delete]" value="1" id="flexCheckDefault649101418232731353943475054">
                                                        <label class="form-check-label" for="flexCheckDefault649101418232731353943475054"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[rolemanagement][manage]" value="1" id="flexCheckDefault6510111519242832364044475155">
                                                        <label class="form-check-label" for="flexCheckDefault6510111519242832364044475155"></label>
                                                    </div>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td style="color:black;font-weight:600;">Permission</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[permissionmanageuser][add]" value="1" id="flexCheckDefault617812162125293233374145485256">
                                                        <label class="form-check-label" for="flexCheckDefault617812162125293233374145485256"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[permissionmanageuser][edit]" value="1" id="flexCheckDefault63891317222630334384246495357">
                                                        <label class="form-check-label" for="flexCheckDefault63891317222630334384246495357"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[permissionmanageuser][delete]" value="1" id="flexCheckDefault64910141823273135394347505458">
                                                        <label class="form-check-label" for="flexCheckDefault64910141823273135394347505458"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[permissionmanageuser][manage]" value="1" id="flexCheckDefault651011151924283236404447515559">
                                                        <label class="form-check-label" for="flexCheckDefault651011151924283236404447515559"></label>
                                                    </div>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td style="color:black;font-weight:600;">Service Type</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicetype][add]" value="1" id="flexCheckDe1">
                                                        <label class="form-check-label" for="flexCheckDe1"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicetype][edit]" value="1" id="flexCheckD2">
                                                        <label class="form-check-label" for="flexCheckD2"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicetype][delete]" value="1" id="flexCheckD3">
                                                        <label class="form-check-label" for="flexCheckD3"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[servicetype][manage]" value="1" id="flexCheck4">
                                                        <label class="form-check-label" for="flexCheck4"></label>
                                                    </div>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td style="color:black;font-weight:600;">Package Information</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[packageinformation][add]" value="1" id="flexCheckDe12">
                                                        <label class="form-check-label" for="flexCheckDe12"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[packageinformation][edit]" value="1" id="flexCheckD23">
                                                        <label class="form-check-label" for="flexCheckD23"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[packageinformation][delete]" value="1" id="flexCheckD34">
                                                        <label class="form-check-label" for="flexCheckD34"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[packageinformation][manage]" value="1" id="flexCheck45">
                                                        <label class="form-check-label" for="flexCheck45"></label>
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
                                                        <input class="form-check-input" type="checkbox" name="permission[customer][manage]" value="1" id="flexCheck456">
                                                        <label class="form-check-label" for="flexCheck456"></label>
                                                    </div>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td style="color:black;font-weight:600;">Add Customer</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[addcustomer][add]" value="1" id="flexCheckDe127">
                                                        <label class="form-check-label" for="flexCheckDe127"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[addcustomer][edit]" value="1" id="flexCheckD238">
                                                        <label class="form-check-label" for="flexCheckD238"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[addcustomer][delete]" value="1" id="flexCheckD349">
                                                        <label class="form-check-label" for="flexCheckD349"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[addcustomer][manage]" value="1" id="flexCheck4510">
                                                        <label class="form-check-label" for="flexCheck4510"></label>
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
                                                        <input class="form-check-input" type="checkbox" name="permission[newcustomerapproval][manage]" value="1" id="flexCheck451014">
                                                        <label class="form-check-label" for="flexCheck451014"></label>
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
                                                        <input class="form-check-input" type="checkbox" name="permission[customerstatusupdate][manage]" value="1" id="flexCheck4510116">
                                                        <label class="form-check-label" for="flexCheck4510116"></label>
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
                                                        <input class="form-check-input" type="checkbox" name="permission[customerbill][manage]" value="1" id="flexCheck451011">
                                                        <label class="form-check-label" for="flexCheck451011"></label>
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
                                                        <input class="form-check-input" type="checkbox" name="permission[billgenerate][manage]" value="1" id="flexCheck451015">
                                                        <label class="form-check-label" for="flexCheck451015"></label>
                                                    </div>
                                                </td>
                                            </tr>




                                            <tr>
                                                <td style="color:black;font-weight:600;">Bill Collection</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[billcollection][add]" value="1" id="flexCheckDe1271216">
                                                        <label class="form-check-label" for="flexCheckDe1271216"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[billcollection][edit]" value="1" id="flexCheckD2381317">
                                                        <label class="form-check-label" for="flexCheckD2381317"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[billcollection][delete]" value="1" id="flexCheckD3491418">
                                                        <label class="form-check-label" for="flexCheckD3491418"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[billcollection][manage]" value="1" id="flexCheck45101519">
                                                        <label class="form-check-label" for="flexCheck45101519"></label>
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
                                                        <input class="form-check-input" type="checkbox" name="permission[reports][manage]" value="1" id="flexCheck451015192164">
                                                        <label class="form-check-label" for="flexCheck451015192164"></label>
                                                    </div>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td style="color:black;font-weight:600;">Bandwith Purchase</td>
                                                <td></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[bandwithpurchase][add]" value="1" id="flexCheckDe12712161">
                                                        <label class="form-check-label" for="flexCheckDe12712161"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[bandwithpurchase][edit]" value="1" id="flexCheckD23813172">
                                                        <label class="form-check-label" for="flexCheckD23813172"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[bandwithpurchase][delete]" value="1" id="flexCheckD34914183">
                                                        <label class="form-check-label" for="flexCheckD34914183"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permission[bandwithpurchase][manage]" value="1" id="flexCheck451015194">
                                                        <label class="form-check-label" for="flexCheck451015194"></label>
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
                                                        <input class="form-check-input" type="checkbox" name="permission[accounts][manage]" value="1" id="flexCheck45101519401">
                                                        <label class="form-check-label" for="flexCheck45101519401"></label>
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


    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Permissions</h4>
                </div>
                <div class="card-body">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $permission->role->name }}</td>
                                    <td>
                                        @isset(auth()->user()->role->permission['permission']['permissionmanageuser']['manage'])
                                            <a class="btn-info edit-icon" href="{{ route('permission_edit_form',$permission->id ) }}"><i class="mdi mdi-table-edit"></i></a>
                                        @endisset

                                        @isset(auth()->user()->role->permission['permission']['permissionmanageuser']['manage'])
                                            <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{ $permission->id  }}" href="#"><i class="mdi mdi-delete"></i></a>
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
            <form method="post" action="{{ route('permission_delete_form') }}">
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