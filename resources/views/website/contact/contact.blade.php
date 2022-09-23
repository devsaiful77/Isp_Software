@extends('layouts.website')
@section('title')
    Contact
@endsection 
@section('content')
    <!-- Package area start -->
    <div class="services-breadcrumb-bg" style="background-image: url('{{ asset('contents/website') }}/assets/img/bg/1.png');">
        <div class="container">
            <div class="row">
                <div class="services-tabile">
                    <div class="services-breadcrumb">
                        <h2>Contact Us</h2>
                        <ul>
                            <li><a href="{{ route('website') }}"><i class="fa-solid fa-house-chimney"></i> Home</a></li>
                            <li>|</li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Package area end -->

    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.82238876776!2d90.2792362344559!3d23.78088745825361!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2z4Kai4Ka-4KaV4Ka-!5e0!3m2!1sbn!2sbd!4v1650285587285!5m2!1sbn!2sbd" width="540" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
    </div>
@endsection