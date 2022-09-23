@extends('layouts.website')
@section('title')
    About
@endsection 
@section('content')
    <!-- Package area start -->
    <div class="services-breadcrumb-bg" style="background-image: url('{{ asset('contents/website') }}/assets/img/bg/1.png');">
        <div class="container">
            <div class="row">
                <div class="services-tabile">
                    <div class="services-breadcrumb">
                        <h2>About Us</h2>
                        <ul>
                            <li><a href="{{ route('website') }}"><i class="fa-solid fa-house-chimney"></i> Home</a></li>
                            <li>|</li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Package area end -->

    <!-- About Us Start -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                    <div class="about-content">
                        <div class="about-head">
                            <h2>About Us</h2>
                        </div>
                        <div class="about-description mt-4">
                            <p>PowerNet started its journey in 2012 when internet or virtual networking was not very popular and business related to technologies were very rare. As the internet services were very expensive and the customers were mostly corporate institutions, the investment field was very risky. Moreover, internationally there was weak internet connection with low bandwidth activity which created high chance of risk to reach to the local customers</p>
                        </div>
                        <div class="about-link mt-5">
                            <a class="main-button" href="#">Read More <i class="fa-solid fa-angles-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                    <div class="about-picture">
                        <img src="{{ asset('contents/website') }}/assets/img/about/about.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us End -->
@endsection