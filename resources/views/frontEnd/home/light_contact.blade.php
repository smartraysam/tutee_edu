@php $page_title="Contact Us"; @endphp
@extends('frontEnd.home.front_master')
@section('main_content')
    <!--================ Home Banner Area =================-->
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

    </style>

    <section class="container-fluid box-1420">
        <div class="banner-area"
             style="background: linear-gradient(0deg, rgba(128,210,255,0.69)
                     , rgba(5, 14, 173, 0.64)), url({{'public/backEnd/img/client/common-banner1.jpg'}}) no-repeat center; height: 450px;">

            <div class="banner-inner">
                <div class="banner-content mt-5 pt-5">
                    <h2 class="pt-2">Contact Us</h2>
                    <h3 style="color: white">Get In Touch</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="contact_area mt-5">
        <div class="container text-center">
        <h1 style="font-weight: bold; font-size: 35px">How Can We Help?</h1>
        </div>
    </section>
    <!--================Contact Area =================-->
    <section class="contact_area mt-5">
        <div class="container-fluid px-5">
            <div class="row align-items-center">
                <div class="offset-lg-1 col-lg-5 col-sm-12">
                    <!-- <div id="mapBox" class="mapBox"
                        data-lat="23.707310"
                        data-lon="90.415480"
                        data-zoom="13"
                        data-info="Panthapath, Dhaka"
                        data-mlat="23.707310"
                        data-mlon="90.415480">
                    </div> -->
                    {{--<div class="map mapBox"></div>--}}
                    <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
                        <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div>
                        <script>(function () {
                                var setting = {"height":540,"width":803,"zoom":12,"queryString":"Colombo, Sri Lanka","place_id":"ChIJA3B6D9FT4joRjYPTMk0uCzI","satellite":false,"centerCoord":[6.9218424063500406,79.85620546741725],"cid":"0x320b2e4d32d3838d","lang":"en","cityUrl":"/sri-lanka/colombo-19459","cityAnchorText":"Map of Colombo, Colombo District, Sri Lanka","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"364097"};
                                var d = document;
                                var s = d.createElement('script');
                                s.src = 'https://1map.com/js/script-for-user.js?embed_id=364097';
                                s.async = true;
                                s.onload = function (e) {
                                    window.OneMap.initMap(setting)
                                };
                                var to = d.getElementsByTagName('script')[0];
                                to.parentNode.insertBefore(s, to);
                            })();</script><a href="https://1map.com/map-embed">1 Map</a>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-12">
                    <div class="contact_info ml-1">
                        <div class="info_item">
                            <i class="ti-home"></i>
                            <h6>Address:</h6>
                            <p>No 11/A muthumaari amman road, Negombo.</p>
                        </div>
                        <div class="info_item">
                            <i class="ti-headphone-alt"></i>
                            <h6>Phone:</h6>
                            <p><a href="#">+9477 87 27 707</a></p>
                        </div>
                        <div class="info_item">
                            <i class="ti-envelope"></i>
                            <h6>Email:</h6>
                            <p><a href="mailto:info@tuteeeducation.com">info@tuteeeducation.com</a></p>
                        </div>
                    </div>
                    <section class="container box-1420 mt-5">
                        <div class="info_item">
                            <h3 style="font-weight: bolder;">Submit your questions and inquiries to us!</h3>
                        </div>
                        @if(session()->has('message-success'))
                            <div class="alert alert-success">
                                {{ session()->get('message-success') }}
                            </div>
                        @elseif(session()->has('message-danger'))
                            <div class="alert alert-danger">
                                {{ session()->get('message-danger') }}
                            </div>
                        @endif
                    </section>
                    <form action="{{url('send-message')}}" class="row contact_form mt-50" method="post" id="contactForm"
                          novalidate="novalidate">
                        @csrf
                        <div class="col-lg-12 col">
                            <div class="input-effect">
                                <input class="primary-input form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       type="text" id="" name="name">
                                <span class="focus-border"></span>
                                <label>Enter your name <span>*</span>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif

                            </div>
                            <div class="input-effect mt-20">
                                <input class="primary-input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       type="email" id="" name="email">
                                <span class="focus-border"></span>
                                <label>Enter your email <span>*</span>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            {{--                            <div class="input-effect mt-20">--}}
                            {{--                                <input class="primary-input form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" type="text" id="" name="subject">--}}
                            {{--                                <span class="focus-border"></span>--}}
                            {{--                                <label>Enter Subject <span>*</span>--}}
                            {{--                                @if ($errors->has('subject'))--}}
                            {{--                                    <span class="invalid-feedback" role="alert">--}}
                            {{--                                        <strong>{{ $errors->first('subject') }}</strong>--}}
                            {{--                                    </span>--}}
                            {{--                                @endif--}}
                            {{--                            </div>--}}
                            <div class="input-effect mt-20">
                                <textarea class="primary-input form-control" name="message" cols="0"
                                          rows="4"></textarea>
                                <span class="focus-border textarea"></span>
                                <label>Enter Message <span>*</span>
                                    @if ($errors->has('message'))
                                        <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 mt-30">
                            <button type="submit" value="submit" class="primary-btn fix-gr-bg">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!--================Contact Area =================-->
    <section class="container-fluid py-4">
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-lg-6 col-sm-12 text-center py-5" style="background-color: whitesmoke;justify-content: center;">
                    <div><h2 style="color: darkslateblue">Our Approach</h2></div>
                    <div>
                        <div><h3 style="color:#828bb2">We take care of your children education activities as you do as a
                                parent.</h3></div>
                    </div>
                    <div><a href="#" role="button">
                            <button type="submit" value="submit" class="primary-btn fix-gr-bg">
                                Send Message
                            </button>
                        </a></div>
                </div>
                <div class="col-lg-6 col-sm-12 text-center py-5" style="background-color: #eeeeee;justify-content: center">
                    <div><h2 style="color:darkslateblue">Services</h2></div>
                    <div>
                        <div>
                            <h3 style="color:#828bb2">We are dedicated our whole time to prepare quality educational guide
                                to every student who trust us</h3>
                        </div>
                    </div>
                    <div><a href="#" role="button">
                            <button type="submit" value="submit" class="primary-btn fix-gr-bg">
                                Email Us
                            </button>
                        </a></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{asset('public/backEnd/')}}/vendors/js/gmap3.min.js"></script>
    <script>
        $('.map')
            .gmap3({
                center: [<?php echo $contact_info->latitude;?>, <?php echo $contact_info->longitude;?>],
                zoom: 4
            })
            .marker([
                {position: [<?php echo $contact_info->latitude;?>, <?php echo $contact_info->longitude;?>]},
                {address: "<?php echo $contact_info->google_map_address;?>"},
                {
                    address: "<?php echo $contact_info->google_map_address;?>",
                    icon: "https://maps.google.com/mapfiles/marker_grey.png"
                }
            ])
            .on('click', function (marker) {
                marker.setIcon('https://maps.google.com/mapfiles/marker_green.png');
            });

    </script>
@endsection





