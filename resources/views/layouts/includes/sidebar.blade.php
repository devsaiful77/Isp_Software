<aside class="left-sidebar print_none">
    <div class="scroll-sidebar">
        <div class="user-profile">
            <div class="profile-img"> <img src="{{ asset('contents/admin') }}/assets/images/users/1.jpg" alt="user" />
                <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
            </div>
            <div class="profile-text">
                <h5>{{Auth::user()->name}}</h5>
                <a href="index.html#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                <a href="app-email.html" class="" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <a href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                <div class="dropdown-menu animated flipInY">
                    <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                    <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item"><i class="mdi mdi-power"></i>Logout</a>
                </div>
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <!--  Dashboard  -->
                <li>

                    <a class="waves-effect waves-dark" href="{{ route('admin.dashboard') }}" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <!--  My Website  -->
                <li>
                    <a class="waves-effect waves-dark" target="_blank" href="{{ route('website') }}" aria-expanded="false"><i class="mdi mdi-web"></i><span class="hide-menu">My Website</span></a>

                </li>


                <!--  Company Profile -->
                @isset(auth()->user()->role->permission['permission']['companyprofile']['manage'])
                <li>
                    <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-face-profile"></i><span class="hide-menu">Company Profile</span></a>

                    <ul aria-expanded="false" class="collapse">

                        @isset(auth()->user()->role->permission['permission']['companyinformation']['manage'])
                        <li>
                            <a class="waves-effect waves-dark" href="{{ route('company_profile_form') }}"> <span class="hide-menu">Company Information</span></a>
                        </li>
                        @endisset

                        @isset(auth()->user()->role->permission['permission']['banner']['manage'])
                        <li>
                            <a class="waves-effect waves-dark" href="{{ route('banner_new_form') }}"> <span class="hide-menu">Banner</span></a>
                        </li>
                        @endisset

                        @isset(auth()->user()->role->permission['permission']['offerpublishwebsite']['manage'])
                        <li>
                            <a class="waves-effect waves-dark" href="{{ route('offer_new_form') }}" aria-expanded="false"><span class="hide-menu">Offer Publish Website</span></a>
                        </li>
                        @endisset

                    </ul>
                </li>
                @endisset

                <!-- General Settings -->
                @isset(auth()->user()->role->permission['permission']['generalsetting']['manage'])
                <li>
                    <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">General Setting</span></a>
                    <ul aria-expanded="false" class="collapse">
                        @isset(auth()->user()->role->permission['permission']['division']['manage'])
                        <li><a href="{{ route('division_new_form') }}">Division</a></li>
                        @endisset

                        @isset(auth()->user()->role->permission['permission']['district']['manage'])
                        <li><a href="{{ route('district_new_form') }}">District</a></li>
                        @endisset

                        @isset(auth()->user()->role->permission['permission']['upazila']['manage'])
                        <li><a href="{{ route('upazila_new_form') }}">Upazila</a></li>
                        @endisset

                        @isset(auth()->user()->role->permission['permission']['union']['manage'])
                        <li><a href="{{ route('union_new_form') }}">Union</a></li>
                        @endisset

                        @isset(auth()->user()->role->permission['permission']['addconnectionstatus']['manage'])
                        <li><a href="{{ route('connection_status_area_new_form') }}">Add Custom Status</a></li>
                        @endisset

                        @isset(auth()->user()->role->permission['permission']['servicearea']['manage'])
                        <li><a href="{{ route('service_area_new_form') }}">Service Area</a></li>
                        @endisset

                        @isset(auth()->user()->role->permission['permission']['servicesubarea']['manage'])
                        <li><a href="{{ route('service_sub_area_new_form') }}">Service Sub Area</a></li>
                        @endisset

                        @isset(auth()->user()->role->permission['permission']['popinformation']['manage'])
                        <li><a href="{{ route('pop_address_new_form') }}">PoP Information</a></li>
                        @endisset

                    </ul>
                </li>
                @endisset

                <!-- Materials/Devices -->
                <li>
                    <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">Devices</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('category.add') }}">Device Category</a></li>
                        <li><a href="{{ route('brand.add') }}">Sub Category</a></li>
                        <li><a href="{{ route('size.add') }}">Device Brand</a></li>
                        <li><a href="{{ route('product.purchase.add') }}">Purchase</a></li>
                        <li><a href="{{ route('product-invendory') }}">Device Inventory</a></li>

                    </ul>
                </li>

                <!--  Manage User  -->
                @isset(auth()->user()->role->permission['permission']['manageuser']['manage'])
                <li>
                    <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-human-male"></i><span class="hide-menu">Manage Users</span></a>

                    <ul aria-expanded="false" class="collapse">
                        @isset(auth()->user()->role->permission['permission']['usermanagement']['manage'])
                        <li><a href="{{ route('user_new_form') }}">Add User</a></li>
                        @endisset

                        @isset(auth()->user()->role->permission['permission']['rolemanagement']['manage'])
                        <li><a href="{{ route('role_new_form') }}">Add Role </a></li>
                        @endisset

                        @isset(auth()->user()->role->permission['permission']['permissionmanageuser']['manage'])
                        <li><a href="{{ route('permission_new_form') }}">User Permission </a></li>
                        @endisset
                    </ul>
                </li>
                @endisset

                <!--  Service Type  -->
                @isset(auth()->user()->role->permission['permission']['servicetype']['manage'])
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('service_type_new_form') }}"><i class="mdi mdi-server"></i><span class="hide-menu">Service Type</span></a>
                </li>
                @endisset

                <!-- Package Information   -->
                @isset(auth()->user()->role->permission['permission']['packageinformation']['manage'])
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('package_info_new_form') }}"><i class="mdi mdi-package-variant"></i><span class="hide-menu">Package Information</span></a>
                </li>
                @endisset

                <!--  Customers  -->
                @isset(auth()->user()->role->permission['permission']['customer']['manage'])
                <li>
                    <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-human-male"></i><span class="hide-menu">Customers</span></a>
                    <ul aria-expanded="false" class="collapse">

                        <li><a href="{{ route('customer.quotation.initial.add') }}">Cus. Quotation</a></li>

                        @isset(auth()->user()->role->permission['permission']['addcustomer']['manage'])
                        <li><a href="{{ route('customer_new_form') }}">Add Customer</a></li>
                        @endisset

                        @isset(auth()->user()->role->permission['permission']['newcustomerapproval']['manage'])
                        <li><a class="waves-effect waves-dark" href="{{ route('connection_new_form') }}">
                                <span class="hide-menu">New Customer Approval</span></a></li>
                        @endisset

                        @isset(auth()->user()->role->permission['permission']['customerstatusupdate']['manage'])
                        <li><a href="{{ route('customer_connect_desconnect_form') }}">Status Update</a></li>
                        @endisset

                    </ul>
                </li>
                @endisset


                <!-- Bill Generation   -->
                @isset(auth()->user()->role->permission['permission']['customerbill']['manage'])
                <li>
                    <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-currency-usd"></i><span class="hide-menu">Customer Bill</span></a>
                    <ul aria-expanded="false" class="collapse">

                        @isset(auth()->user()->role->permission['permission']['billgenerate']['manage'])
                        <li><a href="{{ route('bill_generate_form') }}">Bill Generate</a></li>
                        @endisset

                        @isset(auth()->user()->role->permission['permission']['billcollection']['manage'])
                        <li><a href="{{ route('payment_new_form') }}"> Bill Collection</a></li>
                        @endisset

                        <li><a href="{{ route('customer_bill_search_form') }}"> Bill Search</a></li>

                    </ul>
                </li>
                @endisset

                <li>
                    <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-currency-usd"></i><span class="hide-menu">Cus. Complain</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('customer.complain.add.new.complain') }}"> New Complain</a></li>
                    </ul>
                </li>
                <!-- Report   -->
                @isset(auth()->user()->role->permission['permission']['reports']['manage'])
                <li>
                    <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Report</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('report_payment_form') }}">Bill Collection</a></li>
                        <li><a href="{{ route('report_customer_form') }}">Customers Report</a></li>
                        <li><a href="{{ route('report_daily_cost_form') }}">Daily Cost</a></li>
                        <li><a href="{{ route('report_iig_payment_form') }}">IIG Payment</a></li>
                        <li><a href="{{ route('day_closing_report_form') }}">Day Closing </a></li>
                    </ul>
                </li>
                @endisset


                <!--  Bandwith Purchase   -->
                @isset(auth()->user()->role->permission['permission']['bandwithpurchase']['manage'])
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('product_purchase_new_form') }}"><i class="mdi mdi-snowflake"></i><span class="hide-menu">Bandwith Purchase</span></a>
                </li>
                @endisset

                <!--  Accounts  -->
                @isset(auth()->user()->role->permission['permission']['accounts']['manage'])
                <li>
                    <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-account-card-details"></i><span class="hide-menu">Accounts</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('dr_voucher_new_form') }}">Daily Cost</a></li>
                        <li><a href="{{ route('other_income_new_form') }}">Other Income</a></li>
                        <li><a href="{{ route('debit_new_form') }}">Debit Type</a></li>
                        <li><a href="{{ route('credit_new_form') }}">Credit Type</a></li>
                        <li><a href="{{ route('accounts_head_new_form') }}">Accounts Head</a></li>
                    </ul>
                </li>
                @endisset

                <li>
                    <a class="waves-effect waves-dark" href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="mdi mdi-power"></i><span class="hide-menu">Logout</span></a>
                </li>
            </ul>
        </nav>
        <form id="logout-form" method="POST" action="{{ url('logout') }}">
            @csrf
        </form>
    </div>
</aside>
