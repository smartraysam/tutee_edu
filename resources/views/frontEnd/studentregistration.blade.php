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
    <link rel="icon" href="{{ asset($favicon) }}" type="image/png" />
    <meta name="_token" content="{!! csrf_token() !!}" />
    <link rel="stylesheet" href="{{ asset('public/backEnd/login2') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('public/backEnd/login2') }}/themify-icons.css">


    <link rel="stylesheet" href="{{ url('/') }}/public/backEnd/vendors/css/nice-select.css" />
    <link rel="stylesheet" href="{{ url('/') }}/public/backEnd/vendors/js/select2/select2.css" />



    <link rel="stylesheet" href="{{ asset('public/backEnd/login2') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('public/backEnd/') }}/vendors/css/toastr.min.css" />
    <title>{{ isset($setting) ? (!empty($setting->site_title) ? $setting->site_title : 'System ') : 'System ' }} |
        Register
    </title>
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

        #select-school {
            border: 0px;
            border-radius: 0px;
            border-bottom: 1px solid #d3cddd;
        }

        .nice-select:after {
            content: "\e62a";
            font-family: "themify";
            border: 0;
            transform: rotate(0deg);
            margin-top: -16px;
            font-size: 12px;
            font-weight: 500;
            right: 18px;
            transform-origin: none;
            -webkit-transition: all 0.1s ease-in-out;
            -moz-transition: all 0.1s ease-in-out;
            -o-transition: all 0.1s ease-in-out;
            transition: all 0.1s ease-in-out;
        }

        .nice-select.open:after {
            -webkit-transform: rotate(180deg);
            -moz-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            -o-transform: rotate(180deg);
            transform: rotate(180deg);
            margin-top: 15px;
        }

        .niceSelect {
            border: 0px;
            border-bottom: 1px solid rgba(130, 139, 178, 0.3);
            border-radius: 0px;
            -webkit-appearance: none;
            -moz-appearance: none;
            color: #828bb2;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            padding: 0;
            background: transparent;
        }

        .niceSelect:focus,
        .niceSelect:hover {
            border-color: rgba(130, 139, 178, 0.3);
            outline: none;
            box-shadow: none !important;
        }

        .mb-26 {
            margin-bottom: 26px;
        }

        .nice-select.open .list {
            left: 0;
            position: absolute;
            right: 0;
        }

        .nice-select .nice-select-search {
            box-sizing: border-box;
            background-color: #fff;
            border: 1px solid rgba(130, 139, 178, 0.3);
            border-radius: 3px;
            box-shadow: none;
            color: #333;
            display: inline-block;
            vertical-align: middle;
            padding: 0px 8px;
            width: 100% !important;
            height: 36px;
            line-height: 36px;
            outline: 0 !important;
        }

        .nice-select .list {
            margin-top: 5px;
            top: 100%;
            border-top: 0;
            border-radius: 0 0 5px 5px;
            max-height: 210px;
            overflow-y: scroll;
            padding: 52px 0 0;
            left: 0 !important;
            right: 0 !important;
        }

        .niceSelect span.current {
            width: 85% !important;
            overflow: hidden !important;
            display: block !important;
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

        .in_login_page_header h5 {
            background: -webkit-linear-gradient(90deg, #050ead 0%, #3BB9FF 50%, #050ead 100%);
            background: -moz-linear-gradient(90deg, #050ead 0%, #3BB9FF 50%, #050ead 100%);
            background: -o-linear-gradient(90deg, #050ead 0%, #3BB9FF 50%, #050ead 100%);
            background: -ms-linear-gradient(90deg, #050ead 0%, #3BB9FF 50%, #050ead 100%);
            background: linear-gradient(90deg, #050ead 0%, #3BB9FF 50%, #050ead 100%);
            font-size: 14px;
            color: #fff;
            padding: 42px 15px;
            font-weight: 500;
            text-transform: uppercase;
            margin-bottom: 0;
        }

    </style>
</head>

<body>
    <div class="in_login_part mb-40" style="background-image: -moz-linear-gradient(0deg, #3BB9FF 0%, #050ead 51%, #3BB9FF 100%);
        background-image: -webkit-linear-gradient(0deg, #3BB9FF 0%, #050ead 51%, #3BB9FF 100%);
        background-image: -ms-linear-gradient(0deg, #3BB9FF 0%, #050ead 51%, #3BB9FF 100%);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-8 col-lg-10 col-xl-10 col-md-7">
                    <div class="in_login_content">
                        <img src="{{ asset('public/frontend/Images/tutee 2.png') }}" class="img-fluid"
                            style="width: 100px;height: 100px">
                        <div class="in_login_page_iner">
                            <div class="in_login_page_header">
                                <div class="primary-btn fix-gr-bg">
                                    <h5>registration</h5>
                                </div>
                            </div>
                            <form method="POST" class="needs-validation" novalidate
                                oninput='confirmPassword.setCustomValidity(confirmPassword.value != password.value ? "Passwords do not match." : "")'
                                action="{{ url('student-register') }}" id="infix_form">
                                @csrf
                                <input type="hidden" name="school_id" value="1">
                                <input type="hidden" name="username" id="username-hidden">
                                <input type="hidden" id="url" value="{{ url('/') }}">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="in_single_input">
                                            <input
                                                class="form-control{{ $errors->has('academic_year') ? ' is-invalid' : '' }}"
                                                type="text" name="academic_year" id="academic"
                                                placeholder="Enter Academic Year" value="" required autofocus>
                                            <span class="invalid-feedback text-left pl-3" role="alert">
                                                <strong>Field is required. </strong>
                                            </span>

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group input-group in_single_input">
                                            <input type="text"
                                                class="form-control{{ $errors->has('class') ? ' is-invalid' : '' }}"
                                                name="class" id="class" placeholder="Enter Class" value="" required
                                                autofocus>
                                            <span class="invalid-feedback text-left pl-3" role="alert">
                                                <strong>Field is required. </strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group input-group in_single_input">
                                            <input type="text"
                                                class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                name="first_name" id="first_name" placeholder="student first Name"
                                                value="" required autofocus>
                                            <span class="invalid-feedback text-left pl-3" role="alert">
                                                <strong>Field is required. </strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group in_single_input">
                                            <input type="text"
                                                class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                name="last_name" id="school_name" placeholder="student last Name"
                                                value="" required autofocus>
                                            <span class="invalid-feedback text-left pl-3" role="alert">
                                                <strong>Field is required. </strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="no-gutters input-right-icon in_single_input">
                                            <div class="col">
                                                <div class="input-effect sm2_mb_20 md_mb_20">
                                                    <input
                                                        class="primary-input mydob date read-only-input form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}"
                                                        id="date_of_birth" type="date" name="date_of_birth"
                                                        value="25/01/2021" autocomplete="off" required autofocus>
                                                    <span class="invalid-feedback text-left pl-3" role="alert">
                                                        <strong>Field is required. </strong>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group in_single_input">
                                            <input type="text" name="age" id="age" placeholder="student Age" readonly=""
                                                value="" required autofocus>
                                            <span class="invalid-feedback text-left pl-3" role="alert">
                                                <strong>Field is required. </strong>
                                            </span>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group input-group in_single_input">
                                            <input
                                                class="form-control{{ $errors->has('student_mobile') ? ' is-invalid' : '' }}"
                                                type="text" name="student_mobile" id="student_mobile"
                                                placeholder="student Mobile" value="" required autofocus>
                                            <span class="invalid-feedback text-left pl-3" role="alert">
                                                <strong>Field is required. </strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group in_single_input">
                                            <input
                                                class="form-control{{ $errors->has('student_email') ? ' is-invalid' : '' }}"
                                                type="email" name="student_email" id="student_email"
                                                placeholder="student email" value="" required autofocus>
                                            <span class="invalid-feedback text-left pl-3" role="alert">
                                                <strong>Field is required. </strong>
                                            </span>
                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="in_single_input">
                                            <select class="niceSelect w-100 bb pl-5" name="medium"
                                                style="display: none;">
                                                <option data-display="Medium" value="">Medium</option>
                                                <option value="sinhala">Sinhala</option>
                                                <option value="tamil">Tamil</option>
                                                <option value="english">English</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="in_single_input">
                                            <select class="niceSelect w-100 bb pl-5" name="district"
                                                style="display: none;">
                                                <option data-display="District" value="">District</option>
                                                <option value="Ampara">Ampara</option>
                                                <option value="Anuradhapura">Anuradhapura</option>
                                                <option value="Badulla">Badulla</option>
                                                <option value="Batticaloa">Batticaloa</option>
                                                <option value="Colombo">Colombo</option>
                                                <option value="Galle">Galle</option>

                                                <option value="Gampaha">Gampaha</option>
                                                <option value="Hambantota">Hambantota</option>
                                                <option value="Jaffna">Jaffna</option>
                                                <option value="Kalutara">Kalutara</option>
                                                <option value="Kandy">Kandy</option>

                                                <option value="Kegalle">Kegalle</option>
                                                <option value="Kilinochchi">Kilinochchi</option>
                                                <option value="Kurunegala">Kurunegala</option>
                                                <option value="Mannar">Mannar</option>
                                                <option value="Matale">Matale</option>

                                                <option value="Matara">Matara</option>
                                                <option value="Monaragala">Monaragala</option>
                                                <option value="Mullaitivu">Mullaitivu</option>
                                                <option value="NuwaraEliya">Nuwara Eliya</option>
                                                <option value="Polonnaruwa">Polonnaruwa</option>

                                                <option value="Puttalam">Puttalam</option>
                                                <option value="Ratnapura">Ratnapura</option>
                                                <option value="Trincomalee">Trincomalee</option>
                                                <option value="Vavuniya">Vavuniya</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="row" style="margin-top: 20px">
                                    <div class="col-lg-6">
                                        <div class="in_single_input">
                                            <select class="niceSelect w-100 bb pl-5" name="gender"
                                                style="display: none;">
                                                <option data-display="Gender" value="">Gender</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="in_single_input">
                                            <select class="niceSelect w-100 bb pl-5" name="grade" id="grade"
                                                style="display: none;">
                                                <option data-display="Grade" value="">Grade</option>
                                                <option value="6">Grade 6</option>
                                                <option value="7">Grade 7</option>
                                                <option value="8">Grade 8</option>
                                                <option value="9">Grade 9</option>
                                                <option value="10">Grade 10</option>
                                                <option value="11">Grade 11</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>


                                <div style="margin-top: 10px; " id="subjectoption" class="text-center">
                                    <div class="mt-30 mb-2 text-uppercase in_single_input text-center">
                                        <h6 style="text-decoration: underline; color:#636b6f;">Subject Options</h6>
                                    </div>
                                    <div class="row text-left" style="margin-left: 15%">
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="form-check">
                                                    <label style="margin-bottom: 10px" class="form-check-label"
                                                        for="subject_option1">Group One</label>
                                                    <label style="margin-right: 10px" class="col radio-inline"><input
                                                            type="radio" value="2nd Language Sinhala" name="Group_one"
                                                            checked> 2nd Language Sinhala</label>
                                                    <label style="margin-right: 10px" class="col radio-inline"><input
                                                            type="radio" value="2nd Language Tamil" name="Group_one">
                                                        2nd Language Tamil</label>
                                                    <label style="margin-right: 10px" class="col radio-inline"><input
                                                            type="radio" value="Commerce" name="Group_one">
                                                        Commerce</label>
                                                    <label style="margin-right: 10px" class="col radio-inline"> <input
                                                            type="radio" value="Geography" name="Group_one">
                                                        Geography</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="form-check">
                                                    <label style="margin-bottom: 10px " class="form-check-label"
                                                        for="subject_option1">Group Two</label>

                                                    <label style="margin-right: 10px" class="col radio-inline"><input
                                                            type="radio" value="English Literature" name="Group_two"
                                                            checked>
                                                        English Literature</label>
                                                    <label style="margin-right: 10px" class="col radio-inline"> <input
                                                            type="radio" value="Tamil Literature" name="Group_two">
                                                        Tamil Literature</label>
                                                    <label style="margin-right: 10px" class="col radio-inline"> <input
                                                            type="radio" value="Sinhala Literature" name="Group_two">
                                                        Sinhala Literature</label>
                                                    <label style="margin-right: 10px" class="col radio-inline"> <input
                                                            type="radio" value="Dance" name="Group_two">
                                                        Dance</label>
                                                    <label style="margin-right: 10px" class="col radio-inline"><input
                                                            type="radio" value="Music" name="Group_two">
                                                        Music</label>
                                                    <label style="margin-right: 10px" class="col radio-inline"><input
                                                            type="radio" value="Art" name="Group_two">
                                                        Art</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="form-check">
                                                    <label style="margin-bottom: 10px" class="form-check-label"
                                                        for="subject_option1">Group Three</label>
                                                    <label style="margin-right: 10px" class="col radio-inline"><input
                                                            type="radio" value="ICT" name="Group_three" checked>
                                                        ICT</label>
                                                    <label style="margin-right: 10px" class="col radio-inline"><input
                                                            type="radio" value="Health science" name="Group_three">
                                                        Health science</label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row" style="margin-top: 20px">
                                    <div class="col">

                                        <div class="form-group input-group in_single_input">
                                            <input
                                                class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                type="password" name='password' id='password'
                                                placeholder="Enter Password" required>
                                            <span class="invalid-feedback text-left pl-3" role="alert">
                                                <strong>Field is required. </strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group input-group in_single_input">
                                            <input
                                                class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                id="confirmPassword" type="password" class="form-control"
                                                name="confirmPassword" placeholder="Confirm Password" required>
                                            <span class="invalid-feedback text-left pl-3" role="alert">
                                                <strong>Password not match</strong>
                                            </span>

                                        </div>
                                    </div>

                                </div>

                                <div class="mt-40 mb-5 text-uppercase in_single_input">
                                    <h4 style="text-decoration: underline; color:#636b6f;">Guardian Info</h4>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group input-group in_single_input">
                                            <input
                                                class="form-control{{ $errors->has('guardian_name') ? ' is-invalid' : '' }}"
                                                type="text" name="guardian_name" id="guardian_name"
                                                placeholder="Guardian Name" value="" required>
                                            <span class="invalid-feedback text-left pl-3" role="alert">
                                                <strong>Field is required. </strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="d-flex justify-content-between">
                                            <p class="text-uppercase mb-0 mr-2 in_single_input"
                                                style="color:rgba(99,107,111,0.81);">Guardian Relation</p>
                                            <div class="in_checkbox">
                                                <div class="boxes">
                                                    <input type="radio" name="relationButton" id="relationFather"
                                                        value="F" class="common-radio relationButton">
                                                    <label for="relationFather">Father</label>
                                                </div>
                                            </div>
                                            <div class="in_checkbox">
                                                <div class="boxes">
                                                    <input type="radio" name="relationButton" id="relationMother"
                                                        value="M" class="common-radio relationButton">
                                                    <label for="relationFather">Mother</label>
                                                </div>
                                            </div>
                                            <div class="in_checkbox">
                                                <div class="boxes">
                                                    <input type="radio" name="relationButton" id="relationOther"
                                                        value="O" class="common-radio relationButton" checked="">
                                                    <label for="relationFather">Others</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group input-group in_single_input">
                                            <input
                                                class="form-control{{ $errors->has('guardian_email') ? ' is-invalid' : '' }}"
                                                type="text" name="guardian_email" id="guardian_email"
                                                placeholder="Guardian Email" value="" required>
                                            <span class="invalid-feedback text-left pl-3" role="alert">
                                                <strong>Field is required. </strong>
                                            </span>
                                        </div>
                                        <div class="text-danger error-message invalid-select mb-10"
                                            id="guardian_email_error"></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group in_single_input">
                                            <input
                                                class="form-control{{ $errors->has('guardian_mobile') ? ' is-invalid' : '' }}"
                                                type="text" name="guardian_mobile" id="guardian_mobile"
                                                placeholder="Guardian  Mobile" value="" required autofocus>
                                            <span class="invalid-feedback text-left pl-3" role="alert">
                                                <strong>Field is required. </strong>
                                            </span>
                                        </div>
                                        <div class="text-danger error-message invalid-select mb-10"
                                            id="guardian_mobile_error"></div>
                                    </div>
                                </div>

                                <div class="row mt-20">
                                    <div class="col-lg-12">
                                        <div class="form-group input-group in_single_input">
                                            <input
                                                class="form-control{{ $errors->has('how_do_know_us') ? ' is-invalid' : '' }}"
                                                type="text" name="how_do_know_us" id="school_name"
                                                placeholder="How do you know us.?" value="" required>
                                            <span class="invalid-feedback text-left pl-3" role="alert">
                                                <strong>Field is required. </strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="in_login_button text-center">
                                    <div class="form-group row mb-0">
                                        <button type="submit" class="in_btn primary-btn fix-gr-bg"> <span
                                                class="ti-lock"></span>
                                            {{ __('Register') }}
                                        </button>

                                    </div>
                                </div>
                                <div class="create_account text-center">
                                    <p>Already have an account? <a style="text-decoration: underline;"
                                            href="{{ url('login') }}">Login Here</a></p>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--================ Footer Area =================-->


    <!--================ End Footer Area =================-->
    <script src="{{ asset('public/backEnd/login2') }}/js/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('public/backEnd/login2') }}/js/popper.min.js"></script>
    <script src="{{ asset('public/backEnd/login2') }}/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('public/backEnd/') }}/vendors/js/toastr.min.js"></script>
    <script src="{{ asset('public/backEnd/') }}/vendors/js/nice-select.min.js"></script>
    <script>
        if ($('.niceSelect').length) {
            $('.niceSelect').niceSelect();
        }
        $(document).ready(function() {

            $('#btnsubmit').on('click', function() {
                $(this).html('Please wait ...')
                    .attr('disabled', 'disabled');
                $('#infix_form').submit();
            });

        });
        $('#date_of_birth').change(function() {
            var dob = $(this).val();
            dob = new Date(dob);
            var today = new Date();
            var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
            $('#age').val(age + ' years old');
        });
        $("#subjectoption").hide();
        $(document).ready(function() {
            $("#email-address").keyup(function() {
                $("#username-hidden").val($(this).val());
            });
        });
        $("#grade").change(function() {
            var grade = $(this).children("option:selected").val();
            if (parseInt(grade) > 9) {
                $("#subjectoption").show(1000);
            } else {
                $("#subjectoption").hide(1000);
            }
        });

    </script>
    <script>
        // Self-executing function
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

    </script>
    {!! Toastr::message() !!}
</body>

</html>
