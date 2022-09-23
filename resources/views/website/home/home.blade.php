@extends('layouts.website')
@section('title')
    Home
@endsection 
@section('content')
    <!-- Slider Start -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div class="slider">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach( $banners as $banner )
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                            @endforeach
                            </ol>

                            <div class="carousel-inner" role="listbox">
                                @foreach( $banners as $banner )
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <img class="d-block  w-100 slider-image" src="{{ asset('contents/website') }}/assets/img/slider/slider-1.jpg" alt="">
                                        <div class="slider-content d-none d-md-block">
                                            <h4>{{ $banner->bannerName }}</h4>
                                            <p>{{ $banner->bannerTitle }}</p>
                                            <h5>{{ $banner->bannerSubTitle }}</h5>
                                        </div>
                                </div>
                                @endforeach
                            </div>
                            
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Slider End -->

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

    <!-- Package Area Start -->
    <section class="section-padding">
        <div class="pavorite-package">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="pavorite-package-tabile">
                            <div class="pavorite-package-content">
                                <h4>CHOSE YOUR FAVORITE PACKAGE</h4>
                                <h2>Best packages for you</h2>
                                <p>Our best quality internet packages for you. Please chose your internet connection. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="package-picture">
                            <img src="{{ asset('contents/website') }}/assets/img/package/2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-package-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="package-carousel owl-carousel">
                            @foreach($packages as $package)
                                <div class="single-package-items">
                                    <div class="single-package-content">
                                        <h4>{{ $package->packageName }}</h4>
                                        <strong class="package-tk-month">
                                            <span class="package-bntaka">৳</span>
                                            <span class="package-entk">{{ $package->price }}</span>
                                            <span class="package-month">Monthly</span>
                                        </strong>
                                    </div>
                                    <div class="single-package-list">
                                        <ul>
                                            <li><i class="fa-solid fa-play"></i> {{ $package->bandwidth }} </li>
                                            <li><i class="fa-solid fa-play"></i> Facebook unlimited</li>
                                            <li><i class="fa-solid fa-play"></i> Youtube unlimited</li>
                                            <li><i class="fa-solid fa-play"></i> BDIX 100 mbps</li>
                                            <li><i class="fa-solid fa-play"></i> FTP unlimited</li>
                                            <li><i class="fa-solid fa-play"></i> Public IP- NO</li>
                                        </ul>
                                    </div>
                                    <div class="single-package-link">
                                        <a href="#">Get Started</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Package Area End -->

    <!-- Client Feedback Start -->
    <section class="feedback-bg section-padding" style="background-image: url('{{ asset('contents/website') }}/assets/img/feedback-bg/feedback.png');">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 d-flex align-self-center">
                    <div class="feedback-content">
                        <div class="feedback-head">
                            <h2>Our Client's FeedBack</h2>
                        </div>
                        <div class="feedback-description">
                            <p>অপটিক্যাল ফাইবার দ্বারা সর্বোচ্চ স্পিড ও সর্বোচ্চ মান এবং সেবা (২৪/৭) মাধ্যামে ব্রডব্যান্ড ইন্টারনেট সংযোগ দেওয়া হচ্ছে।</p>
                        </div>
                        <div class="feedback-link">
                            <a class="main-button" href="#">About Us <i class="fa-solid fa-angles-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                    <div class="feedback-testimonials owl-carousel">
                        <div class="client-items">
                            <div class="client-picture-title">
                                <img src="{{ asset('contents/website') }}/assets/img/testimonial/1.jpg" alt="">
                                <div class="client-title">
                                    <h5>Muktasina Islam</h5>
                                    <span>fashion design</span>
                                </div>
                            </div>
                            <div class="client-content">
                                <p>অপটিক্যাল ফাইবার দ্বারা সর্বোচ্চ স্পিড ও সর্বোচ্চ মান এবং সেবা মাধ্যামে ব্রডব্যান্ড ইন্টারনেট সংযোগ দেওয়া হচ্ছে।</p>
                            </div>
                        </div>
                        <div class="client-items">
                            <div class="client-picture-title">
                                <img src="{{ asset('contents/website') }}/assets/img/testimonial/1.jpg" alt="">
                                <div class="client-title">
                                    <h5>Hasibur Rahman</h5>
                                    <span>Comuter Science</span>
                                </div>
                            </div>
                            <div class="client-content">
                                <p>অপটিক্যাল ফাইবার দ্বারা সর্বোচ্চ স্পিড ও সর্বোচ্চ মান এবং সেবা মাধ্যামে ব্রডব্যান্ড ইন্টারনেট সংযোগ দেওয়া হচ্ছে।</p>
                            </div>
                        </div>
                        <div class="client-items">
                            <div class="client-picture-title">
                                <img src="{{ asset('contents/website') }}/assets/img/testimonial/1.jpg" alt="">
                                <div class="client-title">
                                    <h5>Sumayea Islam</h5>
                                    <span>Multimedia</span>
                                </div>
                            </div>
                            <div class="client-content">
                                <p>অপটিক্যাল ফাইবার দ্বারা সর্বোচ্চ স্পিড ও সর্বোচ্চ মান এবং সেবা মাধ্যামে ব্রডব্যান্ড ইন্টারনেট সংযোগ দেওয়া হচ্ছে।</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Client Feedback End -->

    <!-- Coatact Us Start -->
    <section class="contact-us-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                    <div class="contact-us-content">
                        <div class="contact-us-head">
                            <h2>Let's Get in Touch</h2>
                        </div>
                        <div class="contact-us-left">
                            <div class="contact-us-icon">
                                
                            </div>
                            <div class="contact-us-list">
                                <i class="fa-solid fa-envelope"></i>
                                <span class="contact-email">3iengineers@gmail.com</span>
                            </div>
                        </div>
                        <div class="contact-us-left">
                            <div class="contact-us-list">
                                <i class="fa-solid fa-phone-flip"></i>
                                <span class="contact-phone">0173-1540-704, 0191-7994-637</span>
                            </div>
                        </div>
                        <div class="contact-us-left">
                            <div class="contact-us-list">
                                <i class="fa-solid fa-location-dot"></i>
                                <span class="contact-address">Charabag, Ashulia, Dhaka-1341</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                    <div class="contact-area">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <input type="text" class="form-control contact-input-bg" id="inputEmail4" placeholder="Your Name">
                                </div>
                                <div class="form-group col-6">
                                    <input type="text" class="form-control contact-input-bg" id="inputEmail4" placeholder="Your Number">
                                </div>
                                <div class="form-group col-12">
                                    <input type="email" class="form-control contact-input-bg" id="inputEmail4" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control contact-input-textarea" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" class="contact-button">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Coatact Us End -->

@endsection