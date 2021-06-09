@extends('backEnd.master')
@section('mainContent')
    {{-- @if (session('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong style="text-decoration: white;">{{ session('success') }}</strong>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong style="text-decoration: white;">{{ session('error') }}</strong>
        </div>
    @endif --}}
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1>Upload Video</h1>
                <div class="bc-pages">
                    <a href="{{ url('dashboard') }}">@lang('lang.dashboard')</a>
                    <a href="#">@lang('lang.teacher')</a>
                    <a href="#">@lang('lang.upload_content') @lang('lang.list')</a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h3 class="mb-30">
                                    Upload Video
                                </h3>
                            </div>
                            <div class="white-box">
                                <div class="row no-gutters input-right-icon mb-15">
                                    <div class="col">
                                        <div class="input-effect">
                                            <input
                                                class="primary-input form-control {{ $errors->has('video') ? ' is-invalid' : '' }}"
                                                id="video" readonly="true" type="text" placeholder="Attach Video *"
                                                name="video" id="placeholderUploadContent" required>
                                            <span class="focus-border"></span>
                                            @if ($errors->has('video'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('video') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="primary-btn small fix-gr-bg"
                                                for="resumable-browse">@lang('lang.browse')</label>
                                            <input id="resumable-browse" type="file" class="upload-video-file"
                                                style="display: none" name="file" data-url="{{ url('upload') }}">

                                        </button>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="bar"></div>
                                    <div class="percent">0%</div>
                                </div>
                                <br>
                                {{ Form::open(['class' => 'form-horizontal video-upload', 'id' => 'video-upload', 'files' => true, 'url' => 'save-upload-video', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                <div class="add-visitor">
                                    <input type="text" name="filepath" value="" id="filepath" hidden>
                                    <div class="row mb-20">
                                        @if (session()->has('message-success'))
                                            <div class="alert alert-success">
                                                {{ session()->get('message-success') }}
                                            </div>
                                        @elseif(session()->has('message-danger'))
                                            <div class="alert alert-danger">
                                                {{ session()->get('message-danger') }}
                                            </div>
                                        @endif

                                        <div class="col-lg-12 mb-20">

                                            <div class="input-effect">
                                                <input class="primary-input form-control" style="caret-color: #f0932b;"
                                                    type="text" name="content_title" id="content_title" autocomplete="off"
                                                    value="" required>
                                                <label> @lang('lang.content_title') <span>*</span> </label>
                                                <span class="focus-border"></span>
                                                @if ($errors->has('content_title'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('content_title') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-20">
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
                                        <div class="col-lg-12 mb-20">
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
                                        <div class="col-lg-12 mb-20">
                                            <select
                                                class="niceSelect w-100 bb form-control{{ $errors->has('content_subject') ? ' is-invalid' : '' }}"
                                                name="content_subject" id="content_subject">
                                                <option data-display="subject *" value="">
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
                                            @if ($errors->has('content_subject'))
                                                <span class="invalid-feedback invalid-select" role="alert">
                                                    <strong>{{ $errors->first('content_subject') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row no-gutters input-right-icon mb-15">
                                        <div class="col">
                                            <div class="input-effect">
                                                <input
                                                    class="primary-input form-control {{ $errors->has('thumbnail') ? ' is-invalid' : '' }}"
                                                    id="thumbnailpath" readonly="true" type="text" placeholder="Thumbnail *"
                                                    value="" name="thumbnailpath" id="placeholderUploadContent">
                                                <span class="focus-border"></span>
                                                @if ($errors->has('thumbnail'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('thumbnail') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="primary-btn-small-input" type="button">
                                                <label class="primary-btn small fix-gr-bg"
                                                    for="upload_video_thumbnail">@lang('lang.browse')</label>
                                                <input type="file" class="d-none form-control upload_video_thumbnail"
                                                    name="thumbnail" id="upload_video_thumbnail" accept=".png,.jpg,.jpeg"
                                                    value="">
                                            </button>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg" data-toggle="tooltip" type="submit"
                                                id="save" value="Submit" title="{{ @$tooltip }}">
                                                <span class="ti-check"></span>Save
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                {{ Form::close() }}
                            </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="main-title">
                        <h3 class="mb-25">
                            Video Preview
                        </h3>
                    </div>
                    <div class=" white-box">
                        <div class="row video-prev" style="display: none; margin-bottom: 35px">
                            <div class="col-lg-8">
                                <div class="pull-right">
                                    <video height="100%" width="100%" class="video-preview" id="video-preview"
                                        controls="controls">
                                    
                                    </video>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <img src="" id="thumbnail-img" name="thumbnail-img" width="100%" height="230px" />
                                <h6 class="mb-25 text-center">
                                    Thumbnail
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between" style="margin-top: 50px">
                <div class="col">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0"> Upload Video @lang('lang.list')</h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">

                            <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                                <thead>
                                    @if (session()->has('message-success-delete') != '' || session()->get('message-danger-delete') != '')
                                        <tr>
                                            <td colspan="6">
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
                                        <th> Video Title</th>
                                        <th> Grade</th>
                                        <th> Medium</th>
                                        <th> Subject</th>
                                        <th> Status</th>
                                        <th> @lang('lang.date')</th>
                                        <th> @lang('lang.action')</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if (isset($video_list))
                                        @foreach ($video_list as $value)
                                            <tr>
                                                <td>{{ ucfirst(@$value->content_title) }}</td>
                                                <td>Grade {{ @$value->content_grade }}
                                                </td>
                                                <td>{{ ucfirst(@$value->content_medium) }}</td>
                                                <td>{{ ucfirst(@$value->content_subject) }}
                                                </td>
                                                <td>
                                                    @if (@$value->active_status == 1)
                                                        {{ 'Available' }}<br>
                                                    @elseif (@$value->active_status == 0)
                                                        {{ 'Not Available' }}
                                                    @endif
                                                </td>

                                                <td data-sort="{{ strtotime(@$value->upload_date) }}">
                                                    {{ @$value->upload_date != '' ? App\SmGeneralSettings::DateConvater(@$value->upload_date) : '' }}
                                                </td>

                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn dropdown-toggle"
                                                            data-toggle="dropdown">
                                                            @lang('lang.select')
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">

                                                            @if (in_array(91, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1)
                                                                <a class="dropdown-item" data-toggle="modal"
                                                                    data-id="{{ @$value->id }}"
                                                                    data-target="#deleteApplyLeaveModal">@lang('lang.delete')</a>
                                                                <a class="dropdown-item" data-toggle="modal"
                                                                    data-id="{{ @$value->id }}"
                                                                    data-target="#editApplyLeaveModal">Edit</a>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade admin-query" id="deleteApplyLeaveModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('lang.delete')
                        Video</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id" id="data-id" value="">
                    <div class="text-center">
                        <h4>@lang('lang.are_you_sure_to_delete')</h4>
                    </div>

                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('lang.cancel')</button>
                        <button id="confirm" class="primary-btn fix-gr-bg" type="submit">@lang('lang.delete')</button>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade admin-query" id="editApplyLeaveModal" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Video Details</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" enctype="multipart/form-data" id="edit-data-plan">
                        <input type="hidden" name="_token" value=" {{ csrf_token() }}">
                        <input type="hidden" name="id" id="data-id" value="">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="dataplan">Title</label>
                                <input type="text" name="title" id="data-title" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label> Activate</label>
                                <input name="active" id="active" type="checkbox" value="0">
                            </div>
                        </div>
                        <div class="mt-40 d-flex justify-content-between">
                            <button type="button" class="primary-btn tr-bg"
                                data-dismiss="modal">@lang('lang.cancel')</button>
                            <button class="primary-btn fix-gr-bg" type="submit">Update</button>

                        </div>
                    </form>
                </div>
            </div>
        </div> {{-- End Modal Dialog --}}
    </div> {{-- End Modal --}}
    <script src="{{ asset('public/backEnd/login2') }}/js/jquery-3.4.1.min.js"></script>

    <script type="text/javascript" src="{{ asset('public/backEnd/') }}/vendors/js/toastr.min.js"></script>
    {{-- <script src="{{ asset('public/vendor/blueimp-file-upload/js/vendor/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('public/vendor/blueimp-file-upload/js/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('public/vendor/blueimp-file-upload/js/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('public/js/jquery-file-upload.js') }}"></script> --}}
    <script src="{{ asset('public/vendor/resumable/resumable.js') }}"></script>
    <script src="{{ asset('public/js/resumable.js') }}"></script>
    <script type="text/javascript">
        var SITEURL = "{{ URL('/') }}";
        var isupload = false;

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#thumbnail-img').attr('src', e.target.result);
                    var fileName = input.files[0].name;
                    $('#thumbnailpath').val(fileName);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#upload_video_thumbnail").change(function() {
            isupload = true;
            readURL(this);
        });

    </script>

    <script>
        $(document).ready(function(e) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
            $('#save').prop('disabled', true);
            $("#deleteApplyLeaveModal").on("show.bs.modal", function(e) {
                var videoId = $(e.relatedTarget).data("id");
                $(".modal-body  #data-id").val(videoId);
            });
            $("body").on("click", "#confirm", function() {
                $.ajax({
                    url: "/delete-video",
                    type: 'POST',
                    data: 'id=' + $("#data-id").val(),
                    success: function(data) {
                        if (data['status'] == true) {
                            toastr.success('Video delete successfully', {
                                timeOut: 5000
                            });
                        }

                        location.reload();
                        $("#deleteApplyLeaveModal").modal("hide");
                    },
                    error: function(data) {
                        toastr.warning('Error occur', {
                            timeOut: 5000
                        });

                        $("#deleteApplyLeaveModal").modal("hide");
                    }
                });
            });

            $("#editApplyLeaveModal").on("show.bs.modal", function(e) {
                var videoId = $(e.relatedTarget).data("id");
                $.ajax({
                    url: "/get-video",
                    type: 'GET',
                    data: 'id=' + videoId,
                    success: function(msg) {
                        let data = msg;
                        var title = data.content_title;

                        $(".modal-body  #data-title").val(title);
                        $(".modal-body  #data-id").val(videoId);
                        if (data.active_status == '1') {
                            $('.modal-body  #active').prop("checked", true);
                            $('.modal-body  #active').val('1');
                        } else {
                            $('.modal-body  #active').prop("checked", false);
                            $('.modal-body  #active').val('0');
                        }

                    }
                });
            });

            $('.modal-body  #active').on('click', function(e) {

                if ($(this).is(':checked', true)) {
                    $('.modal-body  #active').val('true');
                } else {
                    $('.modal-body  #active').val('false');
                }

            });
            $("#edit-data-plan").submit(function(e) {
                e.preventDefault();
                let form = $("#edit-data-plan").serialize();

                $.ajax({
                    method: "POST",
                    url: "/edit-video",
                    data: form,
                    success: function(response) {
                        $("#editApplyLeaveModal").modal("hide");
                        toastr.success("Update successfull", {
                            timeOut: 5000
                        });
                        location.reload();
                    }
                });
            });
        });

    </script>
@endsection
