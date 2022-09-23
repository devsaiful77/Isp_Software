<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @php 
            $offers = App\Models\Offer::where('status',1)->orderBy('offer_id', 'DESC')->firstOrFail();
        @endphp
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/fontawesome.min.css">
        <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/style.css">
        <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/responsive.css">
    </head>
    <body>

        <!-- ==================== Off Canvas Menu Area End ==================== -->
        <div class="off-canvas-overlay"></div>

        <div class="off-canvas-menu">
            <span class="menu-close">
                <i class="fa-solid fa-xmark"></i>
            </span>
            <ul>
                <li><a href="{{ route('website') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('service') }}">Service</a></li>
                <li><a href="{{ route('package') }}">Package</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>
        <!-- ==================== Off Canvas Menu Area End ==================== -->


        <!-- ==================== Header Start ==================== -->
        
        @include('website.includes.header')
        <!-- ==================== Header End ==================== -->

        <!-- ==================== Main Content Start ==================== -->
        <div class="main-content">

            @yield('content')

        </div>
            

        <!-- ==================== Footer Start ==================== -->
        @include('website.includes.footer')
        <!-- ==================== Footer End ==================== -->










        <script src="{{ asset('contents/website') }}/assets/js/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('contents/website') }}/assets/js/popper.min.js"></script>
        <script src="{{ asset('contents/website') }}/assets/js/bootstrap.min.js"></script>
        <script src="{{ asset('contents/website') }}/assets/js/owl.carousel.min.js"></script>
        <script src="{{ asset('contents/website') }}/assets/js/custom.js"></script>
    </body>
</html>