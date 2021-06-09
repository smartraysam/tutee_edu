<style>
    .footer-list ul {
        list-style: none;
        padding-left: 0;
        margin-bottom: 50px;
    }
    .footer-list ul li{
        display: block;
        margin-bottom: 10px;
        cursor: pointer;
    }
    .f_title {
        margin-bottom: 40px;
    }
    .f_title h4{
        color: #415094;
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 0px;
    }
     .vl {
         border-left: 6px solid blue;
     }
     .li_footer{
         color: black;
     }
    .li_footer:hover{
        color: #3BB9FF;
    }

</style>

<?php
$links = App\SmCustomLink::find(1);

$social_icons = App\SmSocialMediaIcon::where('status', 1)->get();

$setting = App\SmGeneralSettings::find(1);
if (isset($setting->copyright_text)) {
    $copyright_text = $setting->copyright_text;
} else {
    $copyright_text = 'COPYRIGHT &copy; 2020. ALL RIGHTS RESERVED - Tutee - Solution By AppzMaker';
}
if (isset($setting->logo)) {
    $logo = 'public/frontend/Images/tutee (5).png';
} else {
    $logo = 'public/frontend/Images/tutee (5).png';
}
if (isset($setting->site_title) && !empty($setting->site_title)) {
    $site_title = $setting->site_title;
} else {
    $site_title = 'Tutee';
}

if (isset($setting->favicon)) {
    $favicon ='public/frontend/Images/tutee (5).png';
} else {
    $favicon = 'public/frontend/Images/tutee (5).png';
}


$permisions = App\SmFrontendPersmission::where([['parent_id', 1], ['is_published', 1]])->get();
$per = [];
foreach ($permisions as $permision) {
    $per[$permision->name] = 1;
}

$ttl_rtl = $setting->ttl_rtl;
$active_style = App\SmStyle::where('is_active', 1)->first();
?>

        <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" @if(isset ($ttl_rtl ) && $ttl_rtl ==1) dir="rtl" class="rtl" @endif >

<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="Infix is 100+ unique feature enable school management software system. It can manage all type of school, academy and any educational institution"/>
    <link rel="icon" href="{{asset($favicon)}}" type="image/png"/>
    <title>{{ isset($page_title)? $page_title:$site_title }}</title>
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <!-- Bootstrap CSS -->
    @if(isset ($ttl_rtl ) && $ttl_rtl ==1)
        <link rel="stylesheet" href="{{asset('public/backEnd/')}}/css/rtl/bootstrap.min.css"/>
    @else
        <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/bootstrap.css"/>
    @endif


    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/jquery-ui.css"/>


    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/bootstrap-datepicker.min.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/themify-icons.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/nice-select.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/magnific-popup.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/fastselect.min.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/owl.carousel.min.css"/>
    <!-- main css -->


    @if(isset ($ttl_rtl ) && $ttl_rtl ==1)
        <link rel="stylesheet" href="{{asset('public/backEnd/')}}/css/rtl/style.css"/>
    @else
        <link rel="stylesheet" href="{{asset('public/backEnd/')}}/css/{{@$active_style->path_main_style}}"/>
    @endif

    {{-- <link rel="stylesheet" href="{{asset('public/backEnd/')}}/css/toastr.min.css" /> --}}
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/fullcalendar.min.css">
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/fullcalendar.print.css">


    <link rel="stylesheet" href="{{asset('public/')}}/frontend/css/infix.css"/>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @stack('css')
</head>

<body class="client light">
<style>
    @media (max-width: 991px) {
        /* line 2, ../../xampp/htdocs/infixeduB/public/backEnd/scss/client/_header.scss */

        .client .header-area {
            position: fixed;
            padding: 10px 0px;
            top: 0px;
            background: white;
        }
    }
        @media (max-width: 991px) {
            /* line 72, ../../xampp/htdocs/infixeduB/public/backEnd/scss/_update.scss */
            .client.light .header-area .navbar .nav .nav-item .nav-link,
            .client.color .header-area .navbar .nav .nav-item .nav-link {
                color: #050ead !important;
            }
            .collapse{
                background: white;
            }
        }

    .client .header-area {
        position: absolute;
        top: 0;
        width: 100%;
        background: transparent;
        display: block;
        transition: top 0.3s;
    }

    .client .header-area .navbar .navbar-toggler {
        color: #050ead;
        font-size: 20px;
    }
    .client .header-area .navbar .nav .nav-item .nav-link {
        font-size: 12px;
        font-weight: 400;
        color: #fffeff !important;
        text-transform: uppercase;
        padding-left: 8px;
        display: inline-block;
    }

    .client .header-area .navbar .nav .nav-item.active .nav-link {
        color: #3BB9FF !important;
        font-weight: 500;
    }

    /* line 40, ../../xampp/htdocs/infixeduB/public/backEnd/scss/client/_header.scss */
    .client .header-area .navbar .nav .nav-item .nav-link:hover {
        color: #3BB9FF !important;
    }

    /*#navbar {
        position: absolute;
        top: 0;
        width: 100%;
        display: block;
        transition: top 0.3s;
    }*/
</style>
{{--<script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "0";
        } else {
            document.getElementById("navbar").style.top = "-70px";
        }
        prevScrollpos = currentScrollPos;
    }
</script>--}}
<!--================ Start Header Menu Area =================-->
<header class="header-area float-right" {{--style="background-image: url('public/frontend/Images/header_bg.png'")--}}>
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
            <div class="container-fluid box-1420">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand" href="{{url('/')}}/home">
                    <img class="inline-block" src="{{asset('public/frontend/Images/tutee 2.png')}}" alt="Infix Logo" style="height:60px;width:60px">
                </a>
                <a class="navbar-brand" href="{{url('/')}}/home">
                    <h4 class="inline-block" style="color: white; font-size: 20px;">tutee eduction</h4>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="ti-menu"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        @if(App\SmGeneralSettings::isModule('Saas')== FALSE)
                            <li class="nav-item  {{Request::path() == '/' ||  Request::path() == 'home'? 'active':''}} "><a
                                        class="nav-link" href="{{url('/')}}/home">Home</a></li>
                            <li class="nav-item {{Request::path() == 'about'? 'active':''}}"><a class="nav-link"
                                                                                                href="{{url('/')}}/about">About</a>
                       </li>
                            <li class="nav-item {{Request::path() == 'course'? 'active':''}}"><a class="nav-link"
                                                                                                href="{{url('/')}}/course">Course</a>
                            </li>
                            <li class="nav-item {{Request::path() == 'news-page'? 'active':''}}">
                                <a class="nav-link" href="{{url('/')}}/news-page">News</a>
                            </li>
                            <li class="nav-item {{Request::path() == 'contact'? 'active':''}}"><a class="nav-link"
                                                                                                href="{{url('/')}}/contact">Contact</a>
                            </li>
                            @if (Auth::user() =="")
                            <li class="nav-item {{Request::path() == 'login'? 'active':''}}"><a class="nav-link"
                                                                                                href="{{url('/')}}/login">Login</a>
                            </li>
                            @endif

                            @if(App\SmGeneralSettings::isModule('ParentRegistration')== TRUE)
                                @php $is_registration_permission = DB::table('sm_registration_settings')->where('registration_permission',1)->first(); @endphp 
                                @if($is_registration_permission && $is_registration_permission->position==1)
                                    <li class="nav-item"><a class="nav-link"   href="{{url('/parentregistration/registration')}}">Student Registration</a></li>
                                @endif
                            @endif
                            @else

                                <li class="nav-item active">
                                    <a class="nav-link" href="{{url('/login')}}" target="_blank" >Demo</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="{{url('/')}}#Support">Support</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="{{url('/')}}#Price">Price</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="{{url('/')}}#Contact">Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/login')}}" target="_blank" >LOGIN</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/parentregistration/registration')}}" target="_blank" >Student Signup</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/institution-register-new')}}" target="_blank" >School Signup</a>
                                </li>
                        @endif

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <ul class="nav navbar-nav mr-auto search-bar">
                            <li class="">
                            </li>
                        </ul>
                    </ul>
                </div>

            </div>
        </nav>
    </div>

</header>
<!--================ End Header Menu Area =================-->
@yield('main_content')

<!--================Footer Area =================-->
<footer class="footer_area pt-5 {{--section-gap-top--}}">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row footer_inner">
                @php
                    $custom_link=App\SmCustomLink::find(1);
                @endphp
                @if ($custom_link!='')
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="f_title">
                                <img src="{{asset('public/frontend/Images/tutee (5).png')}}" style="height:100px;width:100px" class="img-fluid" alt="">
                            </div>
                            <div class="footer-list">
                                <h5 class="text-dark">tutee we are engaged modern learning management company for students for grade
                                    5 to Advance level students.</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="f_title vl pl-2">
                                <h4>Useful Links</h4>
                            </div>
                            <div class="footer-list">
                                <ul class="list-unstyled">
                                    <li class="li_footer pb-1" style="border-bottom: 1px solid lightgrey">
                                        <a href="{{url('/')}}/home">Home</a></li>
                                    <li class="li_footer pb-1" style="border-bottom: 1px solid lightgrey"><a href="{{url('/')}}/about">About Us</a></li>
                                    <li class="li_footer pb-1" style="border-bottom: 1px solid lightgrey"><a href="{{url('/')}}/contact">Contact</a></li>
                                    <li class="li_footer pb-1" style="border-bottom: 1px solid lightgrey"><a href="{{url('/')}}/login">Login</a></li>
                                    <li class="li_footer pb-1" style="border-bottom: 1px solid lightgrey"><a href="{{url('/')}}/register">Registration</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="f_title vl pl-2">
                                <h4>Policies</h4>
                            </div>
                            <div class="footer-list">
                                <div class="footer-list">
                                    <ul class="list-unstyled">
                                        <li class="li_footer pb-1" style="border-bottom: 1px solid lightgrey">Career</li>
                                        <li class="li_footer pb-1" style="border-bottom: 1px solid lightgrey">Terms & Conditions</li>
                                        <li class="li_footer pb-1" style="border-bottom: 1px solid lightgrey">Privacy Ploicies</li>
                                        <li class="li_footer pb-1" style="border-bottom: 1px solid lightgrey">Admission Inquiry</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="f_title vl pl-2">
                                <h4>Contact Info</h4>
                            </div>
                            <div class="footer-list">
                                <div class="footer-list">
                                    <div class="row ">
                                        <div class="col-lg-12">
                                            <div class="media">
                                                <i class="fa fa-location-arrow fa-2x" aria-hidden="true"
                                                   style="width:40px; height:35px; text-align: center;
                                                           color:#3BB9FF; border: 1px solid black"></i>
                                                <div class="media-body pl-3">
                                                    <p class="text-dark"><b>Address:</b><br>
                                                        No 11/A muthumaari amman road, Negombo.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="media">
                                                <i class="fa fa-phone fa-2x" aria-hidden="true"
                                                   style="width:40px; height:35px; text-align: center;color:#3BB9FF;
                                                           border: 1px solid black"></i>
                                                <div class="media-body pl-3">
                                                    <p class="text-dark"><b>Phone:</b><br>
                                                        <a href="#"> +9477 87 27 707 </a></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="media">
                                                <i class="fa fa-envelope-o fa-2x" aria-hidden="true"
                                                   style="width:40px; height:35px; text-align: center;
                                                                color:#3BB9FF; border: 1px solid black"></i>
                                                <div class="media-body pl-3">
                                                    <p class="text-dark"><b>Email:</b><br>
                                                        <a href="mailto:info@tuteeeducation.com">info@tuteeeducation.com</a> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


                {{-- @if(isset($per["Custom Links"]))
                    @php
                        $url[1]=[1,2,3,4];
                        $url[2]=[5,6,7,8];
                        $url[3]=[9,10,11,12];
                        $url[4]=[13,14,15,16];
                        for($i=1; $i<=4; $i++){
                         $title ='title'.$i ;
                    @endphp
                    <div class="col-lg-3 col-sm-6">
                        <aside class="f_widget ab_widget">
                            <div class="f_title">
                                <h4>{{$links!=""?$links->$title:''}}</h4>
                            </div>
                            <ul>
                                @php
                                    foreach($url[$i] as $j){
                                        $link_label ='link_label'.$j ;
                                        $link_href ='link_href'.$j ;
                                @endphp
                                <li>
                                    <a href="{{$links !="" ? $links->$link_href:''}}"
                                       style="color: #828bb2"> {{$links !="" ? $links->$link_label:''}} </a>
                                </li>
                                @php } @endphp
                            </ul>
                        </aside>
                    </div>
                    @php } @endphp
                @endif --}}

            </div>
        </div>
    </div>
</footer>
<!--================End Footer Area =================-->

<script src="{{asset('public/backEnd/')}}/vendors/js/jquery-3.2.1.min.js">
</script>
<script src="{{asset('public/backEnd/')}}/vendors/js/jquery-ui.js">
</script>
<script src="{{asset('public/backEnd/')}}/vendors/js/popper.js">
</script>
<script src="{{asset('public/backEnd/')}}/vendors/js/bootstrap.min.js">
</script>
<script src="{{asset('public/backEnd/')}}/vendors/js/nice-select.min.js">
</script>
<script src="{{asset('public/backEnd/')}}/vendors/js/jquery.magnific-popup.min.js">
</script>
<script src="{{asset('public/backEnd/')}}/vendors/js/raphael-min.js">
</script>
<script src="{{asset('public/backEnd/')}}/vendors/js/morris.min.js">
</script>
<script src="{{asset('public/backEnd/')}}/vendors/js/owl.carousel.min.js"></script>
{{-- <script src="{{asset('public/backEnd/')}}/vendors/js/toastr.min.js"></script> --}}
<script src="{{asset('public/backEnd/')}}/vendors/js/moment.min.js"></script>
<script src="{{asset('public/backEnd/')}}/vendors/js/print/bootstrap-datetimepicker.min.js"></script>
<script src="{{asset('public/backEnd/')}}/vendors/js/bootstrap-datepicker.min.js"></script>
<!-- <script src="{{asset('public/backEnd/')}}/js/gmap3.min.js"></script> -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwzmSafhk_bBIdIy7MjwVIAVU1MgUmXY4"></script> -->

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDs3mrTgrYd6_hJS50x4Sha1lPtS2T-_JA"></script>
<script src="{{asset('public/backEnd/')}}/js/main.js"></script>
<script src="{{asset('public/backEnd/')}}/js/custom.js"></script>
<script src="{{asset('public/backEnd/')}}/js/developer.js"></script>

@yield('script')

</body>
</html>

