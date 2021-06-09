@php $page_title="About Us"; @endphp
@extends('frontEnd.home.front_master')
@push('css')
    <link rel="stylesheet" href="{{asset('public/')}}/frontend/css/new_style.css"/>
@endpush
@section('main_content')
    <style>
        .primary-btn.fix-gr-bg {
            background: -webkit-linear-gradient( 90deg, #3BB9FF 0%, #050ead 51%, #3BB9FF 100%);
            background: -moz-linear-gradient( 90deg, #3BB9FF 0%, #050ead 51%, #3BB9FF 100%);
            background: -o-linear-gradient( 90deg, #3BB9FF 0%, #050ead 51%, #3BB9FF 100%);
            background: -ms-linear-gradient( 90deg, #3BB9FF 0%, #050ead 51%, #3BB9FF 100%);
            background: linear-gradient( 90deg, #3BB9FF 0%, #050ead 51%, #3BB9FF 100%);
            color: #ffffff;
            background-size: 200% auto;
            -webkit-transition: all 0.4s ease 0s;
            -moz-transition: all 0.4s ease 0s;
            -o-transition: all 0.4s ease 0s;
            transition: all 0.4s ease 0s;
        }
        .client .testimonial-area:after {
            background-image: -moz-linear-gradient(0deg, #3BB9FF 0%, #050ead 51%, #3BB9FF 100%);
            background-image: -webkit-linear-gradient(0deg, #3BB9FF 0%, #050ead 51%, #3BB9FF 100%);
            background-image: -ms-linear-gradient(0deg, #3BB9FF 0%, #050ead 51%, #3BB9FF 100%);
        }
        /*.client .banner-area {
            min-height: 720px;
            display: flex;
            background: linear-gradient( 0deg, #050ead 51%, #3BB9FF 100%), url(../img/client/home-banner1.jpg) no-repeat center;
            background-size: cover;
            z-index: 1;
        }

        .client .home-banner-area {
            min-height: 720px;
            display: flex;
            background: linear-gradient( 0deg, #050ead 51%, #3BB9FF 100%), url(../img/client/home-banner1.jpg) no-repeat center;
            background-size: cover;
            z-index: 1;
        }*/
    </style>
    <!--================ Home Banner Area =================-->
    <section class="container-fluid box-1420">
        <div class="banner-area" style=";background: linear-gradient(0deg, rgba(128,210,255,0.64)
                , rgba(5,14,173,0.58)), url({{'public/backEnd/img/client/home-banner1.jpg'}}) no-repeat center; height: 350px;" >
            <div class="banner-inner">
                <div class="banner-content mt-5 pt-5">
                    <h2 style="font-size: 35px">Who We Are</h2>
                    <h3 class="text-light">Sri Lanka's Biggest Learning App for Students</h3>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Start Facts Area =================-->
    <section class="fact-area mt-5 ">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-1 col-lg-5 my-auto">
                    <div class="white-box mt-4">
                        <div class="d-flex justify-content-between">
                            <div class="row mx-auto">
                                <div class="col-sm-12">
                                    <h1 style="font-weight: bold; font-size: 30px">The History Behind Our <br>
                                        Online Learning Management
                                    </h1>
                                </div>
                                <div class="col-sm-12">
                                    <h3 class="text-secondary">
                                        Online education is the new revaluation of 2020. As a education leaders in the field we have decided to provide the smartest solution for every student in Sri Lanka.
                                        tutee.lk is one of the best and easiest way to educate your children to achieve more on class.
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{asset('public/frontend/Images/childStanding.jpeg')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="fact-area section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mt-20-lg">
                    <img src="{{asset('public/frontend/Images/team-1.jpg')}}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 my-auto">
                    <div class="white-box">
                        <div class="d-flex justify-content-between">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1 style="font-weight: bold; font-size: 30px">
                                        Are you Dedicated, Hardworking, and Fun? Join Us!</h1>
                                </div>
                                <div class="col-sm-12">
                                    <h3 class="text-secondary">
                                        We are always finding the best team mates for our team. Fun filled and be an enthuastic person will have the chance to become a member of smart platform. If intrested kindly ddrop your CV to us today!
                                    </h3>
                                </div>
                                <div>
                                    <a class="primary-btn fix-gr-bg semi-large ml-3" href="{{url('/')}}/contact">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Facts Area =================-->

    <!--================ Start Testimonial Area =================-->
    <section class="testimonial-area relative mt-3" style="height:450px">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-center pt-5 mt-5">
                    <div class="d-flex justify-content-center">
                        <div class="meta text-left pt-5">
                            <h1 class="text-light" style="font-weight: bold; font-size: 30px;">Start Your Free Consultation</h1>
                        </div>
                    </div>
                    <p class="desc text-light" style="font-size: 18px">
                        Want more clarifications on our system? Feel free to contact us today and get your children learning slot today from us!
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!--================ End Testimonial Area =================-->
@endsection

