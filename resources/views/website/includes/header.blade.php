<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-2">
                    <div class="logo">
                        <a href="{{ route('website') }}"><img src="{{ asset('contents/website') }}/assets/img/logo/logo.jpeg" alt="logo" height="100px" width="100px"></a>
                    </div>
                </div>
                <div class="col-xl-7 d-flex">
                    <div class="header-content align-self-center">
                        <h2><marquee>{{ $offers->title }}</marquee></h2>
                    </div>
                </div>
                <div class="col-xl-3">
                    <iframe class="header-video" width="100%" height="100" src="{{ $offers->url }}" allowfullscreen></iframe>
                </div>
                <!-- <div class="col-xl-2">
                    <div class="owner-photo">
                        <img src="{{ asset('contents/website') }}/assets/img/logo/owner.png" alt="owner" width="100px">
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="header-menu">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">

                    <!-- off-canvas-menu-trigger start -->
                    <div class="menu-trigger d-md-none">
                        <span><i class="fa-solid fa-bars"></i></span>
                    </div>
                    <div class="menu float-right d-md-none">Menu</div>
                    <!-- off-canvas-menu-trigger end -->

                    <nav class="main-menu d-none d-md-block">
                        <ul>
                            <li><a href="{{ route('website') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('service') }}">Service</a></li>
                            <li><a href="{{ route('package') }}">Package</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>