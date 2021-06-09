<?php
$setting = App\SmGeneralSettings::find(1);
if (isset($setting->logo)) {
$logo = 'public/frontend/Images/tutee (5).png';
} else {
$logo = 'public/frontend/Images/tutee (5).png';
}
if (isset($setting->favicon)) {
$favicon = 'public/frontend/Images/tutee (5).png';
} else {
$favicon = 'public/frontend/Images/tutee (5).png';
}
$login_background = App\SmBackgroundSetting::where([['is_default', 1], ['title', 'Login Background']])->first();

if (empty($login_background)) {
$css = '';
} else {
if (!empty($login_background->image)) {
$css = "background: url('" . url($login_background->image) . "') no-repeat center; background-size: cover;";
} else {
$css = 'background:' . $login_background->color;
}
}
$active_style = App\SmStyle::where('is_active', 1)->first();
if (isset($setting->site_title) && !empty($setting->site_title)) {
$site_title = 'Tutee';
} else {
$site_title = 'Tutee';
}
$ttl_rtl = $setting->ttl_rtl;
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php echo e(asset($favicon)); ?>" type="image/png" />
    <meta name="_token" content="<?php echo csrf_token(); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/login2')); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/login2')); ?>/themify-icons.css">


    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/backEnd/vendors/css/nice-select.css" />
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/backEnd/vendors/js/select2/select2.css" />

    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/login2')); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/toastr.min.css" />
    <title><?php echo e(isset($setting) ? (!empty($setting->site_title) ? $setting->site_title : 'System ') : 'System '); ?> |
        <?php echo app('translator')->get('lang.login'); ?></title>
    <style>
        .loginButton {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .loginButton {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .singleLoginButton {
            flex: 22% 0 0;
        }

        .loginButton .get-login-access {
            display: block;
            width: 100%;
            border: 1px solid #fff;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 5px;
            white-space: nowrap;
        }

        @media (max-width: 576px) {
            .singleLoginButton {
                flex: 49% 0 0;
            }
        }

        @media (max-width: 576px) {
            .singleLoginButton {
                flex: 49% 0 0;
            }

            .loginButton .get-login-access {
                margin-bottom: 10px;
            }
        }

        .create_account a {
            color: #828bb2;
            font-weight: 500;
            text-decoration: none;
        }

        .primary-btn.fix-gr-bg {
            background: -webkit-linear-gradient(90deg, #3BB9FF 0%, #050ead 51%, #3BB9FF 100%);
            background: -moz-linear-gradient(90deg, #3BB9FF 0%, #050ead 51%, #3BB9FF 100%);
            background: -o-linear-gradient(90deg, #3BB9FF 0%, #050ead 51%, #3BB9FF 100%);
            background: -ms-linear-gradient(90deg, #3BB9FF 0%, #050ead 51%, #3BB9FF 100%);
            background: linear-gradient(90deg, #3BB9FF 0%, #050ead 51%, #3BB9FF 100%);
            color: #ffffff;
            background-size: 200% auto;
            -webkit-transition: all 0.4s ease 0s;
            -moz-transition: all 0.4s ease 0s;
            -o-transition: all 0.4s ease 0s;
            transition: all 0.4s ease 0s;
        }

        @media (max-width: 576px) {
            .in_login_page_iner form {
                padding: 76px 80px 80px;
            }

            .in_single_input input {
                padding: 0 27px 11px;
            }

            .in_login_content img {
                max-width: 120px;
                margin-bottom: 35px;
            }
        }

        @media (min-width:576px) and (max-width: 768px) {
            .in_login_page_iner form {
                padding: 76px 80px 80px;
            }

            .in_single_input input {
                padding: 0 20px 20px;
            }
        }

        @media (min-width: 991px) and (max-width: 1200px) {
            .in_login_page_iner form {
                padding: 76px 80px 80px;
            }

            .in_single_input input {
                padding: 0 30px 20px;
            }
        }

    </style>
</head>

<body>
    <div class="in_login_part mb-40" style="background-image: -moz-linear-gradient(0deg, #3BB9FF 0%, #050ead 51%, #3BB9FF 100%);
        background-image: -webkit-linear-gradient(0deg, #3BB9FF 0%, #050ead 51%, #3BB9FF 100%);
        background-image: -ms-linear-gradient(0deg, #3BB9FF 0%, #050ead 51%, #3BB9FF 100%);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="">
                    <img src="<?php echo e(asset('public/frontend/Images/Login.png')); ?>" class="img-fluid"
                        style="width: 350px;height: 555px">
                </div>
                <div class="">
                    <div class="in_login_content">
                        <div class="in_login_page_iner">
                            <div class="primary-btn fix-gr-bg py-4">
                                <h5><?php echo app('translator')->get('lang.login'); ?> <?php echo app('translator')->get('lang.details'); ?></h5>
                            </div>
                            <form method="POST" class="loginForm" action="<?php echo e(url('/login')); ?>" id="infix_form">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" name="school_id" value="1">
                                <input type="hidden" name="username" id="username-hidden">

                                <?php if (session()->has('message-danger') != ''): ?>
                                <?php if (session()->has('message-danger')): ?>
                                <p class="text-danger"><?php echo e(session()->get('message-danger'));
                                    ?></p>
                                <?php endif; ?>
                                <?php endif; ?>
                                <input type="hidden" id="url" value="<?php echo e(url('/')); ?>">

                                <div class="in_single_input">
                                    <input type="text" placeholder="<?php echo app('translator')->get('lang.enter'); ?> <?php echo app('translator')->get('lang.email'); ?>"
                                        name="email" class="<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                        value="<?php echo e(old('email')); ?>" id="email-address">
                                    <span class="addon_icon">
                                        <i class="ti-email"></i>
                                    </span>
                                    <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback text-left pl-3 d-block" role="alert">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="in_single_input">
                                    <input type="password" placeholder="<?php echo app('translator')->get('lang.enter'); ?>  <?php echo app('translator')->get('lang.password'); ?>"
                                        name="password" class="<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
                                        value="<?php echo e(old('password')); ?>">
                                    <span class="addon_icon">
                                        <i class="ti-key"></i>
                                    </span>
                                    <?php if($errors->has('password')): ?>
                                        <span class="invalid-feedback text-left pl-3 d-block" role="alert">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="in_checkbox">
                                        <div class="boxes">
                                            <input type="checkbox" id="Remember">
                                            <label for="Remember"><?php echo app('translator')->get('lang.remember_me'); ?></label>
                                        </div>
                                    </div>
                                    <div class="in_forgot_pass">
                                        <a href="<?php echo e(url('recovery/passord')); ?>"><?php echo app('translator')->get('lang.forget'); ?>
                                            <?php echo app('translator')->get('lang.password'); ?> ? </a>
                                    </div>
                                </div>
                                <div class="in_login_button text-center">
                                    <button type="submit" class="btn primary-btn fix-gr-bg pt-2 mt-2" id="btnsubmit">
                                        <span class="ti-lock"></span>
                                        <?php echo app('translator')->get('lang.login'); ?>
                                    </button>
                                </div>
                                
                                <div class="div">
                                    <h4 style="font-size: 15px; color:#636b6f;" class="mt-3 mb-3">Or Login With</h4>
                                    <button type="submit" class="btn primary-btn" id="btnsubmit"
                                        style="border: 1px solid blue">
                                        <i class="fa fa-google" aria-hidden="true"></i>
                                    </button>
                                    <button type="submit" class="btn primary-btn" id="btnsubmit"
                                        style="border: 1px solid blue">
                                        <i class="fa fa-apple" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <h4 style="font-size: 15px; color:#636b6f;" class="mt-3">Don’t have an account?<a
                                        class="pl-2" style="text-decoration: underline"
                                        href="<?php echo e(url('signup')); ?>">Sign Up</a></h4>
                            </form>
                        </div>
                    </div>

                    <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                        <div class="row justify-content-center align-items-center" style="margin-top: 25px !important;">
                            <div class="col-lg-12 col-md-12 text-center mt-30 btn-group" id="btn-group">

                                <div class="loginButton">
                                    <?php
                                        $user = DB::table('users')
                                            ->select('email')
                                            ->where('role_id', 1)
                                            ->first();
                                    ?>

                                    <?php if(!empty($user)): ?>
                                        <div class="singleLoginButton">

                                            <form method="POST" class="loginForm"
                                                action="<?php echo e(route('login')); ?>">
                                                <?php
                                                echo csrf_field();
                                                $user = DB::table('users')
                                                ->select('email')
                                                ->where('role_id', 1)
                                                ->first();
                                                $email = $user->email;
                                                ?>
                                                <input type="hidden" name="school_id" value="1">
                                                <input type="hidden" name="email" value="<?php echo e($email); ?>">
                                                <input type="hidden" name="password" value="123456">
                                                <button type="submit" class="white get-login-access">Super
                                                    Admin</button>
                                            </form>

                                        </div>
                                    <?php endif; ?>

                                    <?php
                                        $user = DB::table('users')
                                            ->select('email')
                                            ->where('role_id', 5)
                                            ->first();
                                    ?>

                                    <?php if(!empty($user)): ?>


                                        <div class="singleLoginButton">

                                            <form method="POST" class="loginForm"
                                                action="<?php echo e(route('login')); ?>">
                                                <?php
                                                echo csrf_field();

                                                $email = $user->email;
                                                ?>
                                                <input type="hidden" name="school_id" value="1">
                                                <input type="hidden" name="email" value="<?php echo e($email); ?>">
                                                <input type="hidden" name="password" value="123456">

                                                <button type="submit" class="white get-login-access">Admin</button>
                                            </form>
                                        </div>
                                    <?php endif; ?>
                                    <?php
                                        $user = DB::table('users')
                                            ->select('email')
                                            ->where('role_id', 4)
                                            ->first();
                                    ?>

                                    <?php if(!empty($user)): ?>
                                        <div class="singleLoginButton">

                                            <form method="POST" class="loginForm"
                                                action="<?php echo e(route('login')); ?>">
                                                <?php
                                                echo csrf_field();
                                                // $user =
                                                DB::table('users')
                                                ->select('email')
                                                ->where('role_id', 4)
                                                ->first();
                                                $email = $user->email;
                                                ?>
                                                <input type="hidden" name="school_id" value="1">

                                                <input type="hidden" name="email" value="<?php echo e($email); ?>">
                                                <input type="hidden" name="password" value="123456">

                                                <button type="submit" class="white get-login-access">Teacher</button>
                                            </form>
                                        </div>
                                    <?php endif; ?>
                                    <?php
                                        $user = DB::table('users')
                                            ->select('email')
                                            ->where('role_id', 6)
                                            ->first();
                                    ?>

                                    <?php if(!empty($user)): ?>
                                        <div class="singleLoginButton">

                                            <form method="POST" class="loginForm"
                                                action="<?php echo e(route('login')); ?>">
                                                <?php
                                                echo csrf_field();
                                                $user = DB::table('users')
                                                ->select('email')
                                                ->where('role_id', 6)
                                                ->first();
                                                $email = $user->email;
                                                ?>
                                                <input type="hidden" name="school_id" value="1">
                                                <input type="hidden" name="email" value="<?php echo e($email); ?>">

                                                <input type="hidden" name="password" value="123456">

                                                <button type="submit" class="white get-login-access">Accountant</button>
                                            </form>
                                        </div>
                                    <?php endif; ?>
                                    <?php
                                        $user = DB::table('users')
                                            ->select('email')
                                            ->where('role_id', 7)
                                            ->first();
                                    ?>

                                    <?php if(!empty($user)): ?>
                                        <div class="singleLoginButton">

                                            <form method="POST" class="loginForm"
                                                action="<?php echo e(route('login')); ?>">
                                                <?php
                                                echo csrf_field();
                                                $user = DB::table('users')
                                                ->select('email')
                                                ->where('role_id', 7)
                                                ->first();
                                                $email = $user->email;
                                                ?>
                                                <input type="hidden" name="school_id" value="1">
                                                <input type="hidden" name="email" value="<?php echo e($email); ?>">
                                                <input type="hidden" name="password" value="123456">

                                                <button type="submit"
                                                    class="white get-login-access">Receptionist</button>
                                            </form>
                                        </div>
                                    <?php endif; ?>
                                    <?php
                                        $user = DB::table('users')
                                            ->select('email')
                                            ->where('role_id', 8)
                                            ->first();
                                    ?>

                                    <?php if(!empty($user)): ?>
                                        <div class="singleLoginButton">

                                            <form method="POST" class="loginForm"
                                                action="<?php echo e(route('login')); ?>">
                                                <?php
                                                echo csrf_field();
                                                $user = DB::table('users')
                                                ->select('email')
                                                ->where('role_id', 8)
                                                ->first();
                                                $email = $user->email;
                                                ?>
                                                <input type="hidden" name="school_id" value="1">
                                                <input type="hidden" name="email" value="<?php echo e($email); ?>">
                                                <input type="hidden" name="password" value="123456">

                                                <button type="submit" class="white get-login-access">Librarian</button>
                                            </form>
                                        </div>
                                    <?php endif; ?>
                                    <?php
                                        $user = DB::table('users')
                                            ->select('email')
                                            ->where('role_id', 2)
                                            ->first();
                                    ?>

                                    <?php if(!empty($user)): ?>
                                        <div class="singleLoginButton">

                                            <form method="POST" class="loginForm"
                                                action="<?php echo e(route('login')); ?>">
                                                <?php
                                                echo csrf_field();
                                                $user = DB::table('users')
                                                ->select('email')
                                                ->where('role_id', 2)
                                                ->first();
                                                $email = $user->email;
                                                ?>
                                                <input type="hidden" name="school_id" value="1">
                                                <input type="hidden" name="email" value="<?php echo e($email); ?>">
                                                <input type="hidden" name="password" value="123456">

                                                <button type="submit" class="white get-login-access">Student</button>
                                            </form>
                                        </div>
                                    <?php endif; ?>
                                    <?php
                                        $user = DB::table('users')
                                            ->select('email')
                                            ->where('role_id', 3)
                                            ->first();
                                    ?>

                                    <?php if(!empty($user)): ?>
                                        <div class="singleLoginButton">

                                            <form method="POST" class="loginForm"
                                                action="<?php echo e(route('login')); ?>">
                                                <?php
                                                echo csrf_field();
                                                $user = DB::table('users')
                                                ->select('email')
                                                ->where('role_id', 3)
                                                ->first();
                                                $email = $user->email;
                                                ?>
                                                <input type="hidden" name="school_id" value="1">
                                                <input type="hidden" name="email" value="<?php echo e($email); ?>">
                                                <input type="hidden" name="password" value="123456">

                                                <button type="submit" class="white get-login-access">Parents</button>
                                            </form>
                                        </div>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!--================ Footer Area =================-->
    <footer class="footer_area min-height-10" style="margin-top: -50px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                </div>
            </div>
        </div>
    </footer>


    <!--================ End Footer Area =================-->
    <script src="<?php echo e(asset('public/backEnd/login2')); ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo e(asset('public/backEnd/login2')); ?>/js/popper.min.js"></script>
    <script src="<?php echo e(asset('public/backEnd/login2')); ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/toastr.min.js"></script>



    <script>
        $(document).ready(function() {

            $('#btnsubmit').on('click', function() {
                $(this).html('Please wait ...')
                    .attr('disabled', 'disabled');
                $('#infix_form').submit();
            });

        });


        $(document).ready(function() {
            $("#email-address").keyup(function() {
                $("#username-hidden").val($(this).val());
            });
        });

    </script>



    <?php echo Toastr::message(); ?>

</body>

</html>
<?php /**PATH C:\laragon\www\tutee_edu\resources\views/auth/loginCodeCanyon.blade.php ENDPATH**/ ?>