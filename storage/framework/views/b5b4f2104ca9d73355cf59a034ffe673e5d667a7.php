<?php $page_title="Home - tutee"; ?>


<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/')); ?>/frontend/css/new_style.css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main_content'); ?>
    <?php
    $css= "background: linear-gradient(0deg, rgba(124, 50, 255, 0.6), rgba(199, 56, 216, 0.6)),
    url(".url($homePage->image).") no-repeat center;background-size: cover;";
    ?>

    <style type="text/css">
        @import  url(//fonts.googleapis.com/css?family=Lato:300:400);

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
        .client .events-item .card .card-body .date {
            max-width: 90px !important;
        }
        .card.menuss {
           /* box-shadow: 0 4px 8px 0 lightgrey;*/
            transition: 0.3s;
            height: 560px;
            width: auto;
        }
        .card.menuss img{
            width: 250px;
            height: 300px;
        }

        .card.menuss:hover {
            box-shadow: 0 8px 16px 0 #3BB9FF;
        }
        .card{
            box-shadow: 0 8px 16px 0 whitesmoke;
            transition: 0.3s;
        }
        .col-centered {
            margin: 0 auto;
        }

        .skew-c{
            width:100%;
            height:40px;
            position:absolute;
            left:0px;
            margin-bottom:50px;
            background: linear-gradient(to left bottom, #fff 49%, #3BB9FF);
        }

        /*@media (max-width: 992px) {
            .col-centered .card {
                margin: auto;
            }
        }*/
        .primary-input~.focus-border {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: white;
            -webkit-transition: all 0.4s ease-in-out;
            -moz-transition: all 0.4s ease-in-out;
            -o-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
        }

        .primary-input.placeholder {
            color: white;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
        }


        /* line 108, ../../xampp/htdocs/infixeduB/public/backEnd/scss/_mixins.scss */

        .primary-input:-moz-placeholder {
            color: white;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
        }


        /* line 111, ../../xampp/htdocs/infixeduB/public/backEnd/scss/_mixins.scss */

        .primary-input::-moz-placeholder {
            color: white;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
        }


        /* line 114, ../../xampp/htdocs/infixeduB/public/backEnd/scss/_mixins.scss */

        .primary-input::-webkit-input-placeholder {
            color: white;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
        }


        /* line 308, ../../xampp/htdocs/infixeduB/public/backEnd/scss/admin/_predefine.scss */

        .primary-input:focus {
            color: white !important;
            outline: none !important;
            box-shadow: none !important;
            background: transparent !important;
            border-color: transparent !important;
        }
        @media (max-width: 575px) {
            /* line 72, ../../xampp/htdocs/infixeduB/public/backEnd/scss/_update.scss */
            .bbb {
                background-image:url(<?php echo e('public/frontend/Images/BGHeader.png'); ?>);
                background-repeat: no-repeat;
                background-size: 100% 600px; height: auto;
            }
        }
        @media (max-width: 765px) {
            /* line 27, ../../xampp/htdocs/infixeduB/public/backEnd/scss/client/_home.scss */
            .client .bbb {
                background-image:url(<?php echo e('public/frontend/Images/BGHeader.png'); ?>);
                background-repeat: no-repeat;
                background-size: 100% 600px; height: auto;
            }
        }
        .bbb {
            background-image:url(<?php echo e('public/frontend/Images/BGHeader1.jpg'); ?>);
            background-repeat: no-repeat;
            background-size: 100% 600px; height: auto;
        }
    </style>

    <?php if(isset($per["Image Banner"])): ?>


<section class="container-fluid">
    <div class="banner-area bbb"
         >

        <div class="banner-inner ">
            <div class="banner-content">
                <h3 class="text-white mt-5 pt-4" style="font-weight: bold; font-size: 35px">Smart Learning for
                    Smart Future</h3>
                <h3 style="color: white">Sri Lanka's Biggest Learning App for Students</h3>
                <a href="#" class="btn btn-lg btn-light mt-2 mb-4 app">
                    <i class="fa fa-apple mr-2"></i> APP STORE
                </a>
                <a href="#" class="btn btn-lg btn-light mt-2 mb-4 app">
                    <img class="img-fluid mr-2" alt="playicon" src="<?php echo e(asset('public/frontend/Images/playicon.png')); ?>"/> GOOGLE PLAY
                </a>
                <div class="row">
                    <div class="col-lg-12 mt-20-lg mt-4">
                        <img src="<?php echo e(asset('public/frontend/Images/dashboard_1.png')); ?>" class="img-fluid" alt="" style="width: 600px;height: 400px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        <!--================ Home Banner Area =================-->
        
        
    <?php endif; ?>
    <!--================ End Home Banner Area =================-->

    <!--================ News Area =================-->
    <section class="news-area section-gap-top mt-3" style="background-image:url(<?php echo e('public/frontend/Images/Untitled-1.png'); ?>);
            background-repeat: no-repeat;
            background-position: left;
            background-size: 150px 150px;
            /*background-position: left 10px top 10px;*/">
        <div class="container-fluid">
            <div class="row mx-auto text-center">
                
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 text-center">
                    <div class="card menuss">
                        <div class="card-header text-center" style="background-color: white; border-bottom: none;">
                            <img class="img-fluid p-3" src="https://tutee.lk/wp-content/uploads/2020/10/Illustration-01.png" alt="img_learn">
                            <h2>Learn </h2>
                        </div>
                        <div class="card-body text-center py-0"> Introducing a fastest and easiest way of learning in light board classes for the first time in Sri Lankan history for graduate 6-11 students. Creating worth full and comfortable platform in learning through video classes.</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 ">
                    <div class="card menuss">
                        <div class="card-header text-center" style="background-color: white;border-bottom: none;">
                            <img class="img-fluid" src="https://tutee.lk/wp-content/uploads/2020/10/Illustration-02.png" alt="img_practice">
                            <h2> Practice </h2>
                        </div>
                        <div class="card-body text-center py-0"> Every student can participate the online model examinations to evaluate and improve
                            themselves for the relevant subject and lessons. It's a great basement for the top goals.</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 ">
                    <div class="card menuss">
                        <div class="card-header text-center" style="background-color: white;border-bottom: none;">
                            <img class="img-fluid" src="https://tutee.lk/wp-content/uploads/2020/10/Illustration-03.png" alt="img_live">
                            <h2> Live </h2>
                        </div>
                        <div class="card-body text-center py-0 "> Streaming live lectures from the popular and prominent teachers of the relevant subject in Siri
                            Lanka for a quality learning of every student in all corners of Sri Lanka.</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    <div class="card menuss">
                        <div class="card-header text-center" style="background-color: white;border-bottom: none;">
                            <img class="img-fluid" src="https://tutee.lk/wp-content/uploads/2020/10/Illustration-04.png" alt="img_achieve">
                            <h2> Achieve </h2>
                        </div>
                        <div class="card-body text-center py-0"> The Ranking list system based on evaluating and comparing the
                            marks they scored in the online exams with every other schools of Sri Lanka and giving placement in District levels, and Island level.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--================End News Area =================-->
    <div class="skew-c"></div>
    <?php if(isset($per["Academics"])): ?>
        <!--================ Academics Area =================-->
        <section class="academics-area" style="background-image:url(<?php echo e('public/frontend/Images/Untitled-2.png'); ?>);
                background-repeat: no-repeat;
                background-position: left;
                background-size: 150px 150px;
                background-position: right 30px top 40px;">
            <div class="container-fluid py-5" style="box-shadow: 0 0px 0px 0 lightgrey;">

                <div class="container colour-block">
                    <h5 class="text-secondary font-weight-bolder text-center"> We are available on all platforms</h5>
                    <h1 class="display-4 text-dark text-center"> Grow your <b>report</b> with tutee</h1>
                    <div class="row mt-4">
                        <div class="col-sm-12 col-md-4">
                            <div class="card" style="border: none;">
                                <div class="card-body text-center py-0 px-4">
                                    <img class="img-fluid" src="https://tutee.lk/wp-content/uploads/2020/09/1-768x995.png" alt="img_mobile">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="card pt-4" style="border: none;">
                                <div class="card-body text-center py-0 px-4">
                                    <img class="img-fluid" src="https://tutee.lk/wp-content/uploads/2020/09/2.png" alt="img_tablets">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="card" style="border: none;">
                                <div class="card-body text-center py-0 px-4">
                                    <img class="img-fluid" src="https://tutee.lk/wp-content/uploads/2020/09/3-768x995.png" alt="img_desktop">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    <?php endif; ?>
    <!--================ End Academics Area =================-->

    <!--================ Events Area =================-->
    <section class="fact-area mt-5 mb-5 section-bubble1" style="background-image:url(<?php echo e('public/frontend/Images/Untitled-1.png'); ?>);
            background-repeat: no-repeat;
            background-position: left;
            background-size: 150px 150px;
            background-position: left 30px top 0px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5">
                    <div class="d-flex justify-content-between">
                        <div class="row pl-4">
                            <div class="col-sm-12">
                                <h3>
                                    Why you choose
                                </h3>
                                <h1 style="font-weight: bold; font-size: 30px">tutee?
                                </h1>
                            </div>
                            <div class="col-sm-12">
                                <h4 class="text-dark py-3">
                                    tutee we are focusing on quality education for the students who are eagerly waiting to gain some extra knowledge from our expert teaching team
                                </h4>
                            </div>
                            <div class="row ">
                                <div class="col-lg-12 py-3">
                                    <div class="media">
                                        <i class="fa fa-user-o btn-lg lock" aria-hidden="true" style="width:60px;"></i>
                                        <div class="media-body">
                                            <h2 class="card-title">Expert Teacher</h2>
                                            <p class="card-text">Well trained graduate teachers
                                                with professional experience
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="media">
                                        <i class="fa fa-money btn-lg lock" aria-hidden="true" style="width:60px;"></i>
                                        <div class="media-body">
                                            <h2 class="card-title">Worth The Money</h2>
                                            <p class="card-text">Our cariculam is worth for the fee that you make
                                                for your children
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 mt-20-lg">
                    <img src="<?php echo e(asset('public/frontend/Images/15842-min-1536x1024.jpg')); ?>" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>


    <div class="section" id="pricing">
        <div class="container-fluid">
            <div class="section-title text-center mt-4 pt-4">
                <h1 style="font-size: 30px; font-weight: bold">Get in touch with us today</h1>
            </div>

            <br>
            <div class="card-deck">
                <div class="card mx-0 shadow-none" style="background-color:#050ead;">
                    <div class="card-head text-center"><br>
                        <i class="fa fa-clock-o fa-5x text-white"  aria-hidden="true"></i>
                        <h2 class="text-white" style="font-weight: bold">Opening Hours</h2>
                    </div>
                    <div class="card-body">
                        <p class="text-white text-center">tutee is a online learning management system therefore we are limited to a specific time.
                            Register online at anytime
                        </p><br>
                        <ul>
                            <li class="text-white pb-1" style="border-bottom: 1px solid white; content: '▶'">Why Us</li>
                            <li class="text-white pb-1" style="border-bottom: 1px solid white">Fee Structure</li>
                            <li class="text-white pb-1" style="border-bottom: 1px solid white">Teachers</li>
                        </ul>
                    </div>
                </div>
                <div class="card mx-0 shadow-none" style="background-color:#3BB9FF;">
                    <div class="card-head text-center"><br>
                        
                        <i class="fa fa-phone fa-5x text-white" aria-hidden="true"></i>
                        <h2 class="text-white" style="font-weight: bold">Get In Touch</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled text-center">
                            <li>
                                <a href="tel:+9477%2087%2027%20707">
                                    <i class="fa fa-phone fa-lg text-white" aria-hidden="true"></i>
                                    <span class="text-white">+9477 87 27 707</span>
                                </a>
                            </li>
                            <li>
                                <a href="http://info@tutee.com" rel="nofollow noopener" target="_blank">
                                    <i class="fa fa-envelope-o fa-lg text-white" aria-hidden="true"></i>
                                    <span class="text-white">info@tutee.com</span>
                                </a>
                            </li>
                        </ul>
                        <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
                            <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
                                    var setting = {"height":350,"width":803,"zoom":12,"queryString":"Colombo, Sri Lanka","place_id":"ChIJA3B6D9FT4joRjYPTMk0uCzI","satellite":false,"centerCoord":[6.9218424063500406,79.85620546741725],"cid":"0x320b2e4d32d3838d","lang":"en","cityUrl":"/sri-lanka/colombo-19459","cityAnchorText":"Map of Colombo, Colombo District, Sri Lanka","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"364097"};
                                    var d = document;
                                    var s = d.createElement('script');
                                    s.src = 'https://1map.com/js/script-for-user.js?embed_id=364097';
                                    s.async = true;
                                    s.onload = function (e) {
                                        window.OneMap.initMap(setting)
                                    };
                                    var to = d.getElementsByTagName('script')[0];
                                    to.parentNode.insertBefore(s, to);
                                })();</script><a href="https://1map.com/map-embed">1 Map</a></div>

                    </div>
                </div>


                <div class="card mx-0 shadow-none" style="background-color:#050ead;">
                    <div class="card-head text-center"><br>
                        <i class="fa fa-envelope-open-o fa-5x text-white" aria-hidden="true"></i>
                        <h2 class="text-white" style="font-weight: bold">Contact Now</h2>
                    </div> <br>
                    <div class="card-body">
                        <form action="<?php echo e(url('send-message')); ?>" class="row contact_form mt-20" method="post" id="contactForm" novalidate="novalidate">
                            <?php echo csrf_field(); ?>
                            <div class="col-lg-12">
                                <div class="input-effect">
                                    <input class="primary-input form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" type="text" id="" name="name">
                                    <span class="focus-border"></span>
                                    <label class="text-white">Enter your name <span>*</span>
                                        <?php if($errors->has('name')): ?>
                                            <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                                    <?php endif; ?>

                                </div>
                                <div class="input-effect mt-20">
                                    <input class="primary-input form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" type="email" id="" name="email">
                                    <span class="focus-border"></span>
                                    <label class="text-white">Enter your email <span>*</span>
                                        <?php if($errors->has('email')): ?>
                                            <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="input-effect mt-20">
                                    <textarea class="primary-input form-control" name="message" cols="0" rows="4"></textarea>
                                    <span class="focus-border textarea"></span>
                                    <label class="text-white">Enter Message <span>*</span>
                                        <?php if($errors->has('message')): ?>
                                            <span class="text-danger" role="alert">
                                        <strong><?php echo e($errors->first('message')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-12 mt-30 text-center">
                                <button type="submit" value="submit" class="primary-btn fix-gr-bg" style="border: 1px solid skyblue">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--================ End Testimonial Area =================-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontEnd.home.front_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tutee_edu\resources\views/frontEnd/home/light_home.blade.php ENDPATH**/ ?>