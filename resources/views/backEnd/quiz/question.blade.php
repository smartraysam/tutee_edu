@extends('backEnd.master')
@section('mainContent')
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1>@lang('Quiz ')</h1>
                <div class="bc-pages">
                    <a href="{{ url('dashboard') }}">@lang('lang.dashboard')</a>
                    <a href="#">@lang('Quiz')</a>
                    <a href="#">@lang('Quiz Bank')</a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">

            @if (in_array(235, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1)
                <div class="row">
                    <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                        <a href="{{ url('quiz') }}" class="primary-btn small fix-gr-bg">
                            <span class="ti-plus pr-2"></span>
                            @lang('lang.add')
                        </a>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h3 class="mb-30">
                                    @lang('Add')
                                    @lang('Quiz')
                                </h3>
                            </div>

                            @if (in_array(235, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1)

                                {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'save-quiz', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'question_bank']) }}

                            @endif
                            <input type="hidden" name="url" id="url" value="{{ URL::to('/') }}">
                            <div class="white-box">
                                <div class="add-visitor">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            @if (session()->has('message-success'))
                                                <div class="alert alert-success">
                                                    {{ session()->get('message-success') }}
                                                </div>
                                            @elseif(session()->has('message-danger'))
                                                <div class="alert alert-danger">
                                                    {{ session()->get('message-danger') }}
                                                </div>
                                            @endif

                                            @if ($errors->has('group'))
                                                <span class="invalid-feedback invalid-select" role="alert">
                                                    <strong>{{ $errors->first('group') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <select
                                                class="niceSelect w-100 bb form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}"
                                                name="subject" id="subject">
                                                <option data-display="Subject *" value="">
                                                    Subject *</option>
                                                <option value="sinhala">Sinhala</option>
                                                <option value="tamil">Tamil</option>
                                                <option value="english">English</option>
                                                <option value="mathematics">Mathematics</option>
                                                <option value="science">Science</option>
                                                <option value="history">History</option>
                                                <option value="geography">Geography</option>
                                                <option value="commerce">Commerce</option>
                                                <option value="ict">ICT</option>
                                            </select>
                                            @if ($errors->has('subject'))
                                                <span class="invalid-feedback invalid-select" role="alert">
                                                    <strong>{{ $errors->first('subject') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <select
                                                class="niceSelect w-100 bb form-control{{ $errors->has('content_grade') ? ' is-invalid' : '' }}"
                                                name="content_grade" id="content_grade">
                                                <option data-display="Grade *" value="">
                                                    Grade *</option>
                                                <option value="6"> Grade 6</option>
                                                <option value="7"> Grade 7</option>
                                                <option value="8"> Grade 8</option>
                                                <option value="9"> Grade 9</option>
                                                <option value="10"> Grade 10</option>
                                                <option value="11"> Grade 11</option>
                                            </select>
                                            @if ($errors->has('content_grade'))
                                                <span class="invalid-feedback invalid-select" role="alert">
                                                    <strong>{{ $errors->first('content_grade') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row mt-25">
                                        <div class="col-lg-12 mt-30-md" id="select_section_div">
                                            <select
                                                class="niceSelect w-100 bb form-control{{ $errors->has('content_medium') ? ' is-invalid' : '' }}"
                                                name="content_medium" id="content_medium" required>
                                                <option data-display="Medium *" value="">
                                                    Medium *</option>
                                                <option value="sinhala">Sinhala</option>
                                                <option value="tamil">Tamil</option>
                                                <option value="english">English</option>

                                            </select>
                                            @if ($errors->has('content_medium'))
                                                <span class="invalid-feedback invalid-select" role="alert">
                                                    <strong>{{ $errors->first('content_medium') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <select
                                                class="niceSelect w-100 bb form-control{{ $errors->has('question_type') ? ' is-invalid' : '' }}"
                                                name="question_type" id="question-type">
                                                <option data-display="@lang('lang.question_type') *" value="">
                                                    @lang('lang.question_type') *</option>
                                                <option value="M">@lang('lang.multiple_choice')</option>
                                                <option value="O">@lang('lang.option')</option>
                                                <option value="T">@lang('lang.true_false')</option>
                                                <option value="F">@lang('lang.fill_in_the_blanks')</option>
                                                <option value="P">@lang('Paragraphy')</option>
                                            </select>
                                            @if ($errors->has('group'))
                                                <span class="invalid-feedback invalid-select" role="alert">
                                                    <strong>{{ $errors->first('group') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <div class="input-effect">
                                                <textarea
                                                    class="primary-input form-control{{ $errors->has('question') ? ' is-invalid' : '' }}"
                                                    cols="0" rows="4" name="question"></textarea>
                                                <label>@lang('lang.question') *</label>
                                                <span class="focus-border textarea"></span>
                                                @if ($errors->has('question'))
                                                    <span
                                                        class="error text-danger"><strong>{{ $errors->first('question') }}</strong></span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-25 options" hidden id="options">
                                        <div class="col-lg-12">
                                            <div class="input-effect">
                                                <label>@lang('option') *</label>
                                                <div class="row" id="option"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <div class="input-effect">
                                                <input
                                                    class="primary-input form-control{{ $errors->has('answer') ? ' is-invalid' : '' }}"
                                                    type="text" name="answer" value="">
                                                <label>@lang('Answer') *</label>
                                                <span class="focus-border"></span>
                                                @if ($errors->has('answer'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('answer') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <div class="input-effect">
                                                <input
                                                    class="primary-input form-control{{ $errors->has('marks') ? ' is-invalid' : '' }}"
                                                    type="number" name="marks" value="">
                                                <label>@lang('lang.marks') *</label>
                                                <span class="focus-border"></span>
                                                @if ($errors->has('marks'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('marks') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip">
                                            <span class="ti-check"></span>
                                            @lang('lang.save') @lang('lang.question')
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0">@lang('Questions') @lang('lang.list')</h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">

                            <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                                <thead>
                                    @if (session()->has('message-success-delete') != '' || session()->get('message-danger-delete') != '')
                                        <tr>
                                            <td colspan="5">
                                                @if (session()->has('message-success-delete'))
                                                    <div class="alert alert-success">
                                                        {{ session()->get('message-success-delete') }}
                                                    </div>
                                                @elseif(session()->has('message-danger-delete'))
                                                    <div class="alert alert-danger">
                                                        {{ session()->get('message-danger-delete') }}
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th>@lang('Subject')</th>
                                        <th>@lang('Grade')</th>
                                        <th>@lang('Meduim')</th>
                                        <th>@lang('lang.question')</th>
                                        <th>@lang('lang.type')</th>
                                        <th>@lang('lang.action')</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($quizs as $quiz)
                                        <tr>
                                            <td>{{ ucfirst($quiz->quiz_subject) }}</td>
                                            <td>{{ $quiz->quiz_grade }}</td>
                                            <td>{{ ucfirst($quiz->quiz_medium) }}</td>
                                            <td>{{ ucfirst($quiz->quiz_question)}}</td>
                                            <td>
                                                @if ($quiz->quiz_type == 'M')
                                                    {{ 'Multiple Choice' }}
                                                @elseif($quiz->type == "O")
                                                    {{ 'Select Choice' }}
                                                @elseif($quiz->type == "T")
                                                    {{ 'True False' }}
                                                @elseif($quiz->type == "F")
                                                    {{ 'Fill in the blank' }}
                                                @else
                                                    {{ 'Paragraphy' }}
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        @lang('lang.select')
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        @if (in_array(236, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1)
                                                            <a class="dropdown-item" data-toggle="modal"
                                                                data-target="#editModal{{ $quiz->id }}"
                                                                href="#">@lang('lang.edit')</a>
                                                        @endif
                                                        @if (in_array(237, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1)

                                                            <a class="dropdown-item" data-toggle="modal"
                                                                data-target="#deleteQuestionBankModal{{ $quiz->id }}"
                                                                href="#">@lang('lang.delete')</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade admin-query"
                                            id="deleteQuestionBankModal{{ $quiz->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">@lang('lang.delete')
                                                            @lang('lang.question_bank')
                                                        </h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4>@lang('lang.are_you_sure_to_delete')</h4>
                                                        </div>

                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg"
                                                                data-dismiss="modal">@lang('lang.cancel')</button>
                                                            {{ Form::open(['url' => 'delete-quiz', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                                            <input hidden type="text" name="id" value="{{ $quiz->id }}">
                                                            <button class="primary-btn fix-gr-bg"
                                                                type="submit">@lang('lang.delete')</button>
                                                            {{ Form::close() }}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade admin-query" id="editModal{{ $quiz->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">@lang('lang.edit')
                                                            @lang('Quiz')
                                                        </h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="d-flex justify-content-between">
                                                            {{ Form::open(['url' => 'edit-quiz', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                                                <input type="text" value="{{$quiz->id}}" name="id" hidden>
                                                            <div  style="width:100%">
                                                                <div class="add-visitor">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            @if (session()->has('message-success'))
                                                                                <div class="alert alert-success">
                                                                                    {{ session()->get('message-success') }}
                                                                                </div>
                                                                            @elseif(session()->has('message-danger'))
                                                                                <div class="alert alert-danger">
                                                                                    {{ session()->get('message-danger') }}
                                                                                </div>
                                                                            @endif

                                                                            @if ($errors->has('group'))
                                                                                <span
                                                                                    class="invalid-feedback invalid-select"
                                                                                    role="alert">
                                                                                    <strong>{{ $errors->first('group') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-25">
                                                                        <div class="col-lg-12">
                                                                            <select
                                                                                class="niceSelect w-100 bb form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}"
                                                                                name="subject" id="subject">
                                                                                <option data-display="Subject *" value="">
                                                                                    Subject *</option>
                                                                                <option value="sinhala" {{ ( $quiz->quiz_subject== "sinhala") ? 'selected' : '' }}>Sinhala</option>
                                                                                <option value="tamil" {{ ( $quiz->quiz_subject== "tamil") ? 'selected' : '' }}>Tamil</option>
                                                                                <option value="english" {{ ( $quiz->quiz_subject== "english") ? 'selected' : '' }}>English</option>
                                                                                <option value="mathematics" {{ ( $quiz->quiz_subject== "mathematics") ? 'selected' : '' }}>Mathematics
                                                                                </option>
                                                                                <option value="science" {{ ( $quiz->quiz_subject== "science") ? 'selected' : '' }}>Science</option>
                                                                                <option value="history" {{ ( $quiz->quiz_subject== "history") ? 'selected' : '' }}>History</option>
                                                                                <option value="geography" {{ ( $quiz->quiz_subject== "geography") ? 'selected' : '' }}>Geography</option>
                                                                                <option value="commerce" {{ ( $quiz->quiz_subject== "commerce") ? 'selected' : '' }}>Commerce</option>
                                                                                <option value="ict" {{ ( $quiz->quiz_subject== "ict") ? 'selected' : '' }}>ICT</option>
                                                                            </select>
                                                                            @if ($errors->has('subject'))
                                                                                <span
                                                                                    class="invalid-feedback invalid-select"
                                                                                    role="alert">
                                                                                    <strong>{{ $errors->first('subject') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-25">
                                                                        <div class="col-lg-12">
                                                                            <select
                                                                                class="niceSelect w-100 bb form-control{{ $errors->has('content_grade') ? ' is-invalid' : '' }}"
                                                                                name="content_grade" id="content_grade">
                                                                                <option data-display="Grade *" value="">
                                                                                    Grade *</option>
                                                                                <option value="6"{{ ( $quiz->quiz_grade== "6") ? 'selected' : '' }}> Grade 6</option>
                                                                                <option value="7" {{ ( $quiz->quiz_grade== "7") ? 'selected' : '' }}> Grade 7</option>
                                                                                <option value="8" {{ ( $quiz->quiz_grade== "8") ? 'selected' : '' }}> Grade 8</option>
                                                                                <option value="9" {{ ( $quiz->quiz_grade== "9") ? 'selected' : '' }}> Grade 9</option>
                                                                                <option value="10" {{ ( $quiz->quiz_grade== "10") ? 'selected' : '' }}> Grade 10</option>
                                                                                <option value="11" {{ ( $quiz->quiz_grade== "11") ? 'selected' : '' }}> Grade 11</option>
                                                                            </select>
                                                                            @if ($errors->has('content_grade'))
                                                                                <span
                                                                                    class="invalid-feedback invalid-select"
                                                                                    role="alert">
                                                                                    <strong>{{ $errors->first('content_grade') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-25">
                                                                        <div class="col-lg-12 mt-30-md"
                                                                            id="select_section_div">
                                                                            <select
                                                                                class="niceSelect w-100 bb form-control{{ $errors->has('content_medium') ? ' is-invalid' : '' }}"
                                                                                name="content_medium" id="content_medium"
                                                                                required>
                                                                                <option data-display="Medium *" value="">
                                                                                    Medium *</option>
                                                                                <option value="sinhala" {{ ( $quiz->quiz_medium == "sinhala") ? 'selected' : '' }}>Sinhala</option>
                                                                                <option value="tamil" {{ ( $quiz->quiz_medium == "tamil") ? 'selected' : '' }}>Tamil</option>
                                                                                <option value="english" {{ ( $quiz->quiz_medium == "english") ? 'selected' : '' }}>English</option>

                                                                            </select>
                                                                            @if ($errors->has('content_medium'))
                                                                                <span
                                                                                    class="invalid-feedback invalid-select"
                                                                                    role="alert">
                                                                                    <strong>{{ $errors->first('content_medium') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-25">
                                                                        <div class="col-lg-12">
                                                                            <select
                                                                                class="niceSelect w-100 bb form-control{{ $errors->has('question_type') ? ' is-invalid' : '' }}"
                                                                                name="question_type" id="question-type">
                                                                                <option
                                                                                    data-display="@lang('lang.question_type') *"
                                                                                    value="">
                                                                                    @lang('lang.question_type') *</option>
                                                                                <option value="M" {{ ( $quiz->quiz_type== "M") ? 'selected' : '' }}>
                                                                                    @lang('lang.multiple_choice')</option>
                                                                                <option value="O"{{ ( $quiz->quiz_type== "O") ? 'selected' : '' }}>@lang('lang.option')
                                                                                </option>
                                                                                <option value="T" {{ ( $quiz->quiz_type== "T") ? 'selected' : '' }}>@lang('lang.true_false')
                                                                                </option>
                                                                                <option value="F" {{ ( $quiz->quiz_type== "F") ? 'selected' : '' }}>
                                                                                    @lang('lang.fill_in_the_blanks')
                                                                                </option>
                                                                                <option value="P" {{ ( $quiz->quiz_type== "P") ? 'selected' : '' }}>@lang('Paragraphy')
                                                                                </option>
                                                                            </select>
                                                                            @if ($errors->has('group'))
                                                                                <span
                                                                                    class="invalid-feedback invalid-select"
                                                                                    role="alert">
                                                                                    <strong>{{ $errors->first('group') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-25">
                                                                        <div class="col-lg-12">
                                                                            <div class="input-effect">
                                                                                <textarea
                                                                                    class="primary-input form-control{{ $errors->has('question') ? ' is-invalid' : '' }}"
                                                                                    cols="0" rows="2"
                                                                                    name="question"> {{ $quiz->quiz_question }}</textarea>
                                                                                <label>@lang('lang.question') *</label>
                                                                                <span class="focus-border textarea"></span>
                                                                                @if ($errors->has('question'))
                                                                                    <span
                                                                                        class="error text-danger"><strong>{{ $errors->first('question') }}</strong></span>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @if ($quiz->quiz_type =="M" || $quiz->quiz_type =="O")
                                                                    <div class="row mt-25 options">
                                                                        <div class="col-lg-12">
                                                                            <div class="input-effect">
                                                                                <label>@lang('option') *</label>
                                                                                <div class="row" id="option">
                                                                                    <div class="col-12"
                                                                                        style="margin-bottom: 5px">
                                                                                        <input type="text"
                                                                                            class="form-control @error('option_0') is-invalid @enderror"
                                                                                            name="option_0" value="{{json_decode($quiz->quiz_options)->option_A}}"
                                                                                            required autofocus>
                                                                                        @error('')
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert"><strong>{{ $message }}
                                                                                                </strong></span>
                                                                                        @enderror
                                                                                    </div>

                                                                                    <div class="col-12"
                                                                                        style="margin-bottom: 5px">
                                                                                
                                                                                        <input type="text"
                                                                                            class="form-control @error('option_1') is-invalid @enderror"
                                                                                            name="option_1" value="{{json_decode($quiz->quiz_options)->option_B}}"
                                                                                            required autofocus>
                                                                                        @error('')
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert"><strong>{{ $message }}
                                                                                                </strong></span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="col-12"
                                                                                        style="margin-bottom: 5px">
                                                                                        <input type="text"
                                                                                            class="form-control @error('option_2') is-invalid @enderror"
                                                                                            name="option_2" value="{{json_decode($quiz->quiz_options)->option_C}}"
                                                                                            required autofocus>
                                                                                        @error('')
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert"><strong>{{ $message }}
                                                                                                </strong></span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="col-12"
                                                                                        style="margin-bottom: 5px">
                                                                                        <input type="text"
                                                                                            class="form-control @error('option_3') is-invalid @enderror"
                                                                                            name="option_3" value="{{json_decode($quiz->quiz_options)->option_D}}"
                                                                                            required autofocus>
                                                                                        @error('')
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert"><strong>{{ $message }}
                                                                                                </strong></span>
                                                                                        @enderror
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                  

                                                                    <div class="row mt-25">
                                                                        <div class="col-lg-12">
                                                                            <div class="input-effect">
                                                                                <input
                                                                                    class="primary-input form-control{{ $errors->has('answer') ? ' is-invalid' : '' }}"
                                                                                    type="text" name="answer"
                                                                                    value=" {{ $quiz->quiz_answer }}">
                                                                                <label>@lang('Answer') *</label>
                                                                                <span class="focus-border"></span>
                                                                                @if ($errors->has('answer'))
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
                                                                                        <strong>{{ $errors->first('answer') }}</strong>
                                                                                    </span>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-25">
                                                                        <div class="col-lg-12">
                                                                            <div class="input-effect">
                                                                                <input
                                                                                    class="primary-input form-control{{ $errors->has('marks') ? ' is-invalid' : '' }}"
                                                                                    type="number" name="marks"
                                                                                    value="{{ $quiz->quiz_mark }}">
                                                                                <label>@lang('lang.marks') *</label>
                                                                                <span class="focus-border"></span>
                                                                                @if ($errors->has('marks'))
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
                                                                                        <strong>{{ $errors->first('marks') }}</strong>
                                                                                    </span>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row mt-40">
                                                                    <div class="col-lg-12 text-center">
                                                                        <button class="primary-btn fix-gr-bg" type="submit"
                                                                            data-toggle="tooltip">
                                                                            <span class="ti-check"></span>
                                                                            @lang('lang.save') @lang('lang.question')
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            {{ Form::close() }}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script src="{{ asset('public/backEnd/') }}/vendors/js/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#question-type').on('change', function() {
            var type = this.value;
            $("#option").empty();
            if (type == "M" || type == "O") {
                $("#options").removeAttr("hidden");
                for (let index = 0; index < 4; index++) {

                    var platename = "option_" + index;
                    var num = index + 1;
                    var placeholder = "Option ";

                    $("#option").append(' <div class="col-12" style="margin-bottom: 5px"> <input ' +
                        'type="text" class="form-control @error("'+platename+'") is-invalid @enderror" name="' +
                        platename +
                        '" value="" required autofocus>' +
                        '@error("'+platename+'")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>');

                }
            } else {

                $("#options").attr("hidden", true);
            }

        });
    });

</script>
