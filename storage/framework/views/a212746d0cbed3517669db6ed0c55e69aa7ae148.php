
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('Quiz '); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('Quiz'); ?></a>
                    <a href="#"><?php echo app('translator')->get('Quiz Bank'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">

            <?php if(in_array(235, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                <div class="row">
                    <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                        <a href="<?php echo e(url('quiz')); ?>" class="primary-btn small fix-gr-bg">
                            <span class="ti-plus pr-2"></span>
                            <?php echo app('translator')->get('lang.add'); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h3 class="mb-30">
                                    <?php echo app('translator')->get('Add'); ?>
                                    <?php echo app('translator')->get('Quiz'); ?>
                                </h3>
                            </div>

                            <?php if(in_array(235, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'save-quiz', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'question_bank'])); ?>


                            <?php endif; ?>
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="white-box">
                                <div class="add-visitor">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <?php if(session()->has('message-success')): ?>
                                                <div class="alert alert-success">
                                                    <?php echo e(session()->get('message-success')); ?>

                                                </div>
                                            <?php elseif(session()->has('message-danger')): ?>
                                                <div class="alert alert-danger">
                                                    <?php echo e(session()->get('message-danger')); ?>

                                                </div>
                                            <?php endif; ?>

                                            <?php if($errors->has('group')): ?>
                                                <span class="invalid-feedback invalid-select" role="alert">
                                                    <strong><?php echo e($errors->first('group')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <select
                                                class="niceSelect w-100 bb form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?>"
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
                                            <?php if($errors->has('subject')): ?>
                                                <span class="invalid-feedback invalid-select" role="alert">
                                                    <strong><?php echo e($errors->first('subject')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <select
                                                class="niceSelect w-100 bb form-control<?php echo e($errors->has('content_grade') ? ' is-invalid' : ''); ?>"
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
                                            <?php if($errors->has('content_grade')): ?>
                                                <span class="invalid-feedback invalid-select" role="alert">
                                                    <strong><?php echo e($errors->first('content_grade')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="row mt-25">
                                        <div class="col-lg-12 mt-30-md" id="select_section_div">
                                            <select
                                                class="niceSelect w-100 bb form-control<?php echo e($errors->has('content_medium') ? ' is-invalid' : ''); ?>"
                                                name="content_medium" id="content_medium" required>
                                                <option data-display="Medium *" value="">
                                                    Medium *</option>
                                                <option value="sinhala">Sinhala</option>
                                                <option value="tamil">Tamil</option>
                                                <option value="english">English</option>

                                            </select>
                                            <?php if($errors->has('content_medium')): ?>
                                                <span class="invalid-feedback invalid-select" role="alert">
                                                    <strong><?php echo e($errors->first('content_medium')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <select
                                                class="niceSelect w-100 bb form-control<?php echo e($errors->has('question_type') ? ' is-invalid' : ''); ?>"
                                                name="question_type" id="question-type">
                                                <option data-display="<?php echo app('translator')->get('lang.question_type'); ?> *" value="">
                                                    <?php echo app('translator')->get('lang.question_type'); ?> *</option>
                                                <option value="M"><?php echo app('translator')->get('lang.multiple_choice'); ?></option>
                                                <option value="O"><?php echo app('translator')->get('lang.option'); ?></option>
                                                <option value="T"><?php echo app('translator')->get('lang.true_false'); ?></option>
                                                <option value="F"><?php echo app('translator')->get('lang.fill_in_the_blanks'); ?></option>
                                                <option value="P"><?php echo app('translator')->get('Paragraphy'); ?></option>
                                            </select>
                                            <?php if($errors->has('group')): ?>
                                                <span class="invalid-feedback invalid-select" role="alert">
                                                    <strong><?php echo e($errors->first('group')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <div class="input-effect">
                                                <textarea
                                                    class="primary-input form-control<?php echo e($errors->has('question') ? ' is-invalid' : ''); ?>"
                                                    cols="0" rows="4" name="question"></textarea>
                                                <label><?php echo app('translator')->get('lang.question'); ?> *</label>
                                                <span class="focus-border textarea"></span>
                                                <?php if($errors->has('question')): ?>
                                                    <span
                                                        class="error text-danger"><strong><?php echo e($errors->first('question')); ?></strong></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-25 options" hidden id="options">
                                        <div class="col-lg-12">
                                            <div class="input-effect">
                                                <label><?php echo app('translator')->get('option'); ?> *</label>
                                                <div class="row" id="option"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <div class="input-effect">
                                                <input
                                                    class="primary-input form-control<?php echo e($errors->has('answer') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="answer" value="">
                                                <label><?php echo app('translator')->get('Answer'); ?> *</label>
                                                <span class="focus-border"></span>
                                                <?php if($errors->has('answer')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('answer')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <div class="input-effect">
                                                <input
                                                    class="primary-input form-control<?php echo e($errors->has('marks') ? ' is-invalid' : ''); ?>"
                                                    type="number" name="marks" value="">
                                                <label><?php echo app('translator')->get('lang.marks'); ?> *</label>
                                                <span class="focus-border"></span>
                                                <?php if($errors->has('marks')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('marks')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip">
                                            <span class="ti-check"></span>
                                            <?php echo app('translator')->get('lang.save'); ?> <?php echo app('translator')->get('lang.question'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0"><?php echo app('translator')->get('Questions'); ?> <?php echo app('translator')->get('lang.list'); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">

                            <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                                <thead>
                                    <?php if(session()->has('message-success-delete') != '' || session()->get('message-danger-delete') != ''): ?>
                                        <tr>
                                            <td colspan="5">
                                                <?php if(session()->has('message-success-delete')): ?>
                                                    <div class="alert alert-success">
                                                        <?php echo e(session()->get('message-success-delete')); ?>

                                                    </div>
                                                <?php elseif(session()->has('message-danger-delete')): ?>
                                                    <div class="alert alert-danger">
                                                        <?php echo e(session()->get('message-danger-delete')); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <th><?php echo app('translator')->get('Subject'); ?></th>
                                        <th><?php echo app('translator')->get('Grade'); ?></th>
                                        <th><?php echo app('translator')->get('Meduim'); ?></th>
                                        <th><?php echo app('translator')->get('lang.question'); ?></th>
                                        <th><?php echo app('translator')->get('lang.type'); ?></th>
                                        <th><?php echo app('translator')->get('lang.action'); ?></th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php $__currentLoopData = $quizs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(ucfirst($quiz->quiz_subject)); ?></td>
                                            <td><?php echo e($quiz->quiz_grade); ?></td>
                                            <td><?php echo e(ucfirst($quiz->quiz_medium)); ?></td>
                                            <td><?php echo e(ucfirst($quiz->quiz_question)); ?></td>
                                            <td>
                                                <?php if($quiz->quiz_type == 'M'): ?>
                                                    <?php echo e('Multiple Choice'); ?>

                                                <?php elseif($quiz->type == "O"): ?>
                                                    <?php echo e('Select Choice'); ?>

                                                <?php elseif($quiz->type == "T"): ?>
                                                    <?php echo e('True False'); ?>

                                                <?php elseif($quiz->type == "F"): ?>
                                                    <?php echo e('Fill in the blank'); ?>

                                                <?php else: ?>
                                                    <?php echo e('Paragraphy'); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        <?php echo app('translator')->get('lang.select'); ?>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <?php if(in_array(236, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                                                            <a class="dropdown-item" data-toggle="modal"
                                                                data-target="#editModal<?php echo e($quiz->id); ?>"
                                                                href="#"><?php echo app('translator')->get('lang.edit'); ?></a>
                                                        <?php endif; ?>
                                                        <?php if(in_array(237, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                                                            <a class="dropdown-item" data-toggle="modal"
                                                                data-target="#deleteQuestionBankModal<?php echo e($quiz->id); ?>"
                                                                href="#"><?php echo app('translator')->get('lang.delete'); ?></a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade admin-query"
                                            id="deleteQuestionBankModal<?php echo e($quiz->id); ?>">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?>
                                                            <?php echo app('translator')->get('lang.question_bank'); ?>
                                                        </h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                                                        </div>

                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg"
                                                                data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                            <?php echo e(Form::open(['url' => 'delete-quiz', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                                            <input hidden type="text" name="id" value="<?php echo e($quiz->id); ?>">
                                                            <button class="primary-btn fix-gr-bg"
                                                                type="submit"><?php echo app('translator')->get('lang.delete'); ?></button>
                                                            <?php echo e(Form::close()); ?>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade admin-query" id="editModal<?php echo e($quiz->id); ?>">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php echo app('translator')->get('lang.edit'); ?>
                                                            <?php echo app('translator')->get('Quiz'); ?>
                                                        </h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="d-flex justify-content-between">
                                                            <?php echo e(Form::open(['url' => 'edit-quiz', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                                                <input type="text" value="<?php echo e($quiz->id); ?>" name="id" hidden>
                                                            <div  style="width:100%">
                                                                <div class="add-visitor">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <?php if(session()->has('message-success')): ?>
                                                                                <div class="alert alert-success">
                                                                                    <?php echo e(session()->get('message-success')); ?>

                                                                                </div>
                                                                            <?php elseif(session()->has('message-danger')): ?>
                                                                                <div class="alert alert-danger">
                                                                                    <?php echo e(session()->get('message-danger')); ?>

                                                                                </div>
                                                                            <?php endif; ?>

                                                                            <?php if($errors->has('group')): ?>
                                                                                <span
                                                                                    class="invalid-feedback invalid-select"
                                                                                    role="alert">
                                                                                    <strong><?php echo e($errors->first('group')); ?></strong>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-25">
                                                                        <div class="col-lg-12">
                                                                            <select
                                                                                class="niceSelect w-100 bb form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?>"
                                                                                name="subject" id="subject">
                                                                                <option data-display="Subject *" value="">
                                                                                    Subject *</option>
                                                                                <option value="sinhala" <?php echo e(( $quiz->quiz_subject== "sinhala") ? 'selected' : ''); ?>>Sinhala</option>
                                                                                <option value="tamil" <?php echo e(( $quiz->quiz_subject== "tamil") ? 'selected' : ''); ?>>Tamil</option>
                                                                                <option value="english" <?php echo e(( $quiz->quiz_subject== "english") ? 'selected' : ''); ?>>English</option>
                                                                                <option value="mathematics" <?php echo e(( $quiz->quiz_subject== "mathematics") ? 'selected' : ''); ?>>Mathematics
                                                                                </option>
                                                                                <option value="science" <?php echo e(( $quiz->quiz_subject== "science") ? 'selected' : ''); ?>>Science</option>
                                                                                <option value="history" <?php echo e(( $quiz->quiz_subject== "history") ? 'selected' : ''); ?>>History</option>
                                                                                <option value="geography" <?php echo e(( $quiz->quiz_subject== "geography") ? 'selected' : ''); ?>>Geography</option>
                                                                                <option value="commerce" <?php echo e(( $quiz->quiz_subject== "commerce") ? 'selected' : ''); ?>>Commerce</option>
                                                                                <option value="ict" <?php echo e(( $quiz->quiz_subject== "ict") ? 'selected' : ''); ?>>ICT</option>
                                                                            </select>
                                                                            <?php if($errors->has('subject')): ?>
                                                                                <span
                                                                                    class="invalid-feedback invalid-select"
                                                                                    role="alert">
                                                                                    <strong><?php echo e($errors->first('subject')); ?></strong>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-25">
                                                                        <div class="col-lg-12">
                                                                            <select
                                                                                class="niceSelect w-100 bb form-control<?php echo e($errors->has('content_grade') ? ' is-invalid' : ''); ?>"
                                                                                name="content_grade" id="content_grade">
                                                                                <option data-display="Grade *" value="">
                                                                                    Grade *</option>
                                                                                <option value="6"<?php echo e(( $quiz->quiz_grade== "6") ? 'selected' : ''); ?>> Grade 6</option>
                                                                                <option value="7" <?php echo e(( $quiz->quiz_grade== "7") ? 'selected' : ''); ?>> Grade 7</option>
                                                                                <option value="8" <?php echo e(( $quiz->quiz_grade== "8") ? 'selected' : ''); ?>> Grade 8</option>
                                                                                <option value="9" <?php echo e(( $quiz->quiz_grade== "9") ? 'selected' : ''); ?>> Grade 9</option>
                                                                                <option value="10" <?php echo e(( $quiz->quiz_grade== "10") ? 'selected' : ''); ?>> Grade 10</option>
                                                                                <option value="11" <?php echo e(( $quiz->quiz_grade== "11") ? 'selected' : ''); ?>> Grade 11</option>
                                                                            </select>
                                                                            <?php if($errors->has('content_grade')): ?>
                                                                                <span
                                                                                    class="invalid-feedback invalid-select"
                                                                                    role="alert">
                                                                                    <strong><?php echo e($errors->first('content_grade')); ?></strong>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-25">
                                                                        <div class="col-lg-12 mt-30-md"
                                                                            id="select_section_div">
                                                                            <select
                                                                                class="niceSelect w-100 bb form-control<?php echo e($errors->has('content_medium') ? ' is-invalid' : ''); ?>"
                                                                                name="content_medium" id="content_medium"
                                                                                required>
                                                                                <option data-display="Medium *" value="">
                                                                                    Medium *</option>
                                                                                <option value="sinhala" <?php echo e(( $quiz->quiz_medium == "sinhala") ? 'selected' : ''); ?>>Sinhala</option>
                                                                                <option value="tamil" <?php echo e(( $quiz->quiz_medium == "tamil") ? 'selected' : ''); ?>>Tamil</option>
                                                                                <option value="english" <?php echo e(( $quiz->quiz_medium == "english") ? 'selected' : ''); ?>>English</option>

                                                                            </select>
                                                                            <?php if($errors->has('content_medium')): ?>
                                                                                <span
                                                                                    class="invalid-feedback invalid-select"
                                                                                    role="alert">
                                                                                    <strong><?php echo e($errors->first('content_medium')); ?></strong>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-25">
                                                                        <div class="col-lg-12">
                                                                            <select
                                                                                class="niceSelect w-100 bb form-control<?php echo e($errors->has('question_type') ? ' is-invalid' : ''); ?>"
                                                                                name="question_type" id="question-type">
                                                                                <option
                                                                                    data-display="<?php echo app('translator')->get('lang.question_type'); ?> *"
                                                                                    value="">
                                                                                    <?php echo app('translator')->get('lang.question_type'); ?> *</option>
                                                                                <option value="M" <?php echo e(( $quiz->quiz_type== "M") ? 'selected' : ''); ?>>
                                                                                    <?php echo app('translator')->get('lang.multiple_choice'); ?></option>
                                                                                <option value="O"<?php echo e(( $quiz->quiz_type== "O") ? 'selected' : ''); ?>><?php echo app('translator')->get('lang.option'); ?>
                                                                                </option>
                                                                                <option value="T" <?php echo e(( $quiz->quiz_type== "T") ? 'selected' : ''); ?>><?php echo app('translator')->get('lang.true_false'); ?>
                                                                                </option>
                                                                                <option value="F" <?php echo e(( $quiz->quiz_type== "F") ? 'selected' : ''); ?>>
                                                                                    <?php echo app('translator')->get('lang.fill_in_the_blanks'); ?>
                                                                                </option>
                                                                                <option value="P" <?php echo e(( $quiz->quiz_type== "P") ? 'selected' : ''); ?>><?php echo app('translator')->get('Paragraphy'); ?>
                                                                                </option>
                                                                            </select>
                                                                            <?php if($errors->has('group')): ?>
                                                                                <span
                                                                                    class="invalid-feedback invalid-select"
                                                                                    role="alert">
                                                                                    <strong><?php echo e($errors->first('group')); ?></strong>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-25">
                                                                        <div class="col-lg-12">
                                                                            <div class="input-effect">
                                                                                <textarea
                                                                                    class="primary-input form-control<?php echo e($errors->has('question') ? ' is-invalid' : ''); ?>"
                                                                                    cols="0" rows="2"
                                                                                    name="question"> <?php echo e($quiz->quiz_question); ?></textarea>
                                                                                <label><?php echo app('translator')->get('lang.question'); ?> *</label>
                                                                                <span class="focus-border textarea"></span>
                                                                                <?php if($errors->has('question')): ?>
                                                                                    <span
                                                                                        class="error text-danger"><strong><?php echo e($errors->first('question')); ?></strong></span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php if($quiz->quiz_type =="M" || $quiz->quiz_type =="O"): ?>
                                                                    <div class="row mt-25 options">
                                                                        <div class="col-lg-12">
                                                                            <div class="input-effect">
                                                                                <label><?php echo app('translator')->get('option'); ?> *</label>
                                                                                <div class="row" id="option">
                                                                                    <div class="col-12"
                                                                                        style="margin-bottom: 5px">
                                                                                        <input type="text"
                                                                                            class="form-control <?php $__errorArgs = ['option_0'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                                            name="option_0" value="<?php echo e(json_decode($quiz->quiz_options)->option_A); ?>"
                                                                                            required autofocus>
                                                                                        <?php $__errorArgs = [''];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert"><strong><?php echo e($message); ?>

                                                                                                </strong></span>
                                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                                    </div>

                                                                                    <div class="col-12"
                                                                                        style="margin-bottom: 5px">
                                                                                
                                                                                        <input type="text"
                                                                                            class="form-control <?php $__errorArgs = ['option_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                                            name="option_1" value="<?php echo e(json_decode($quiz->quiz_options)->option_B); ?>"
                                                                                            required autofocus>
                                                                                        <?php $__errorArgs = [''];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert"><strong><?php echo e($message); ?>

                                                                                                </strong></span>
                                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                                    </div>
                                                                                    <div class="col-12"
                                                                                        style="margin-bottom: 5px">
                                                                                        <input type="text"
                                                                                            class="form-control <?php $__errorArgs = ['option_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                                            name="option_2" value="<?php echo e(json_decode($quiz->quiz_options)->option_C); ?>"
                                                                                            required autofocus>
                                                                                        <?php $__errorArgs = [''];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert"><strong><?php echo e($message); ?>

                                                                                                </strong></span>
                                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                                    </div>
                                                                                    <div class="col-12"
                                                                                        style="margin-bottom: 5px">
                                                                                        <input type="text"
                                                                                            class="form-control <?php $__errorArgs = ['option_3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                                            name="option_3" value="<?php echo e(json_decode($quiz->quiz_options)->option_D); ?>"
                                                                                            required autofocus>
                                                                                        <?php $__errorArgs = [''];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert"><strong><?php echo e($message); ?>

                                                                                                </strong></span>
                                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php endif; ?>
                                                                  

                                                                    <div class="row mt-25">
                                                                        <div class="col-lg-12">
                                                                            <div class="input-effect">
                                                                                <input
                                                                                    class="primary-input form-control<?php echo e($errors->has('answer') ? ' is-invalid' : ''); ?>"
                                                                                    type="text" name="answer"
                                                                                    value=" <?php echo e($quiz->quiz_answer); ?>">
                                                                                <label><?php echo app('translator')->get('Answer'); ?> *</label>
                                                                                <span class="focus-border"></span>
                                                                                <?php if($errors->has('answer')): ?>
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
                                                                                        <strong><?php echo e($errors->first('answer')); ?></strong>
                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-25">
                                                                        <div class="col-lg-12">
                                                                            <div class="input-effect">
                                                                                <input
                                                                                    class="primary-input form-control<?php echo e($errors->has('marks') ? ' is-invalid' : ''); ?>"
                                                                                    type="number" name="marks"
                                                                                    value="<?php echo e($quiz->quiz_mark); ?>">
                                                                                <label><?php echo app('translator')->get('lang.marks'); ?> *</label>
                                                                                <span class="focus-border"></span>
                                                                                <?php if($errors->has('marks')): ?>
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
                                                                                        <strong><?php echo e($errors->first('marks')); ?></strong>
                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row mt-40">
                                                                    <div class="col-lg-12 text-center">
                                                                        <button class="primary-btn fix-gr-bg" type="submit"
                                                                            data-toggle="tooltip">
                                                                            <span class="ti-check"></span>
                                                                            <?php echo app('translator')->get('lang.save'); ?> <?php echo app('translator')->get('lang.question'); ?>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <?php echo e(Form::close()); ?>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/jquery-3.2.1.min.js"></script>
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
                        'type="text" class="form-control <?php $__errorArgs = ["'+platename+'"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="' +
                        platename +
                        '" value="" required autofocus>' +
                        '<?php $__errorArgs = ["'+platename+'"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>');

                }
            } else {

                $("#options").attr("hidden", true);
            }

        });
    });

</script>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tutee_edu\resources\views/backEnd/quiz/question.blade.php ENDPATH**/ ?>