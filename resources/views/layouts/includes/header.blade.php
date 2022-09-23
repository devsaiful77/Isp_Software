<header class="topbar print_none">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">

        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                <b>
                    <img src="{{asset('images/transp_3iEngineers_Logo.png')}}" alt="3IE" width="50px" />

                    <!-- <img src="{{ asset('contents/admin') }}/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                    <img src="{{ asset('contents/admin') }}/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" /> -->
                </b>
                <span>
                    3I Engineers
                    <!-- <img src="{{ asset('contents/admin') }}/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                    <img src="{{ asset('contents/admin') }}/assets/images/logo-light-text.png" class="light-logo" alt="homepage" /> -->
                </span>
            </a>
        </div>

        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto mt-md-0">
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item dropdown">
                </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                    <form class="app-search">
                        <input type="text" class="form-control" placeholder="Search & enter">
                        <a class="srh-btn"><i class="ti-close"></i></a>
                    </form>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('contents/admin') }}/assets/images/users/1.jpg" alt="user" class="profile-pic" /></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="{{ asset('contents/admin') }}/assets/images/users/1.jpg" alt="user"></div>
                                    <div class="u-text">
                                        <h4>{{Auth::user()->name}}</h4>
                                        <p class="text-muted">{{Auth::user()->email}}</p>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a class="waves-effect waves-dark" href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="mdi mdi-power"></i><span class="hide-menu">Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </li> -->
            </ul>
        </div>
    </nav>
</header>
