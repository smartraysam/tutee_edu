<?php
namespace App\Http\Controllers;

use App\ApiBaseMethod;
use App\SmClass;
use App\SmContentType;
use App\SmNotification;
use App\SmStaff;
use App\SmStudent;
use App\SmTeacherUploadContent;
use App\YearCheck;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\RolePermission\Entities\InfixRole;

class SmTeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('PM');
        // User::checkAuth();
    }

    public function uploadContentList(Request $request)
    {

        try {
            $contentTypes = SmContentType::where('academic_id', YearCheck::getAcademicId())->where('school_id', Auth::user()->school_id)->get();

            if (Auth()->user()->role_id == 1) {

                $uploadContents = SmTeacherUploadContent::where('academic_id', YearCheck::getAcademicId())
                    ->where('school_id', Auth::user()->school_id)
                // ->orWhere('created_by', Auth::user()->id)
                    ->get();
                // return  $uploadContents;
                // return  YearCheck::getAcademicId();

            } else {

                $uploadContents = SmTeacherUploadContent::where(function ($q) {
                    $q->where('created_by', Auth::user()->id)->orWhere('available_for_admin', 1);
                })->where('academic_id', YearCheck::getAcademicId())->where('school_id', Auth::user()->school_id)->get();

            }

            $classes = SmClass::where('active_status', '=', '1')->where('academic_id', YearCheck::getAcademicId())->where('school_id', Auth::user()->school_id)->get();

            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                $data = [];
                $data['contentTypes'] = $contentTypes->toArray();
                $data['uploadContents'] = $uploadContents->toArray();
                $data['classes'] = $classes->toArray();
                return ApiBaseMethod::sendResponse($data, 'Content uploaded successfully.');
            }
            return view('backEnd.teacher.uploadContentList', compact('contentTypes', 'classes', 'uploadContents'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function saveUploadContent(Request $request)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        if (isset($request->available_for)) {
            foreach ($request->available_for as $value) {
                if ($value == 'student') {
                    if (!isset($request->all_classes)) {
                        $request->validate([
                            'content_title' => "required|max:200",
                            'content_type' => "required",
                            'upload_date' => "required",
                            'content_file' => "required|mimes:pdf,doc,docx,jpg,jpeg,png|max:10000",
                            'class' => "required",
                            'section' => "required",
                        ]);
                    } else {
                        $request->validate([
                            'content_title' => "required|max:200",
                            'content_type' => "required",
                            'upload_date' => "required",
                            'content_file' => "required|mimes:pdf,doc,docx,jpg,jpeg,png|max:10000",
                        ]);
                    }
                }
            }
        } else {
            $request->validate(
                [
                    'content_title' => "required:max:200",
                    'content_type' => "required",
                    'available_for' => 'required|array',
                    'upload_date' => "required",
                    'content_file' => "required|mimes:pdf,doc,docx,jpg,jpeg,png|max:10000",
                ],
                [
                    'available_for.required' => 'At least one checkbox required!',
                ]
            );
        }
        try {
            $fileName = "";

            if ($request->file('content_file') != "") {
                $file = $request->file('content_file');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('public/uploads/upload_contents/', $fileName);
                $fileName = 'public/uploads/upload_contents/' . $fileName;
            }

            $y = '2012';
            $m = '2012';
            $d = '2012';
            $uploadContents = new SmTeacherUploadContent();
            $uploadContents->content_title = $request->content_title;
            $uploadContents->content_type = $request->content_type;
            $uploadContents->school_id = Auth::user()->school_id;
            $uploadContents->academic_id = YearCheck::getAcademicId();

            foreach ($request->available_for as $value) {
                if ($value == 'admin') {
                    $uploadContents->available_for_admin = 1;
                }

                if ($value == 'student') {
                    if (isset($request->all_classes)) {
                        $uploadContents->available_for_all_classes = 1;
                    } else {
                        $uploadContents->class = $request->class;
                        $uploadContents->section = $request->section;
                    }
                }
            }

            $uploadContents->upload_date = date('Y-m-d', strtotime($request->upload_date));
            $uploadContents->description = $request->description;
            $uploadContents->upload_file = $fileName;
            $uploadContents->created_by = Auth()->user()->id;
            // $uploadContents->created_at = '2012-11-26 13:04:39';
            $results = $uploadContents->save();
            // return  $results;

            if ($request->content_type == 'as') {
                $purpose = 'assignment';
            } elseif ($request->content_type == 'st') {
                $purpose = 'Study Material';
            } elseif ($request->content_type == 'sy') {
                $purpose = 'Syllabus';
            } elseif ($request->content_type == 'ot') {
                $purpose = 'Others Download';
            }

            foreach ($request->available_for as $value) {
                if ($value == 'admin') {
                    $roles = InfixRole::where('id', '=', 1) /* ->where('id', '!=', 2)->where('id', '!=', 3)->where('id', '!=', 9) */->where(function ($q) {
                        $q->where('school_id', Auth::user()->school_id)->orWhere('type', 'System');
                    })->get();
                    foreach ($roles as $role) {
                        $staffs = SmStaff::where('role_id', $role->id)->where('school_id', Auth::user()->school_id)->get();
                        foreach ($staffs as $staff) {
                            $notification = new SmNotification;
                            $notification->user_id = $staff->user_id;
                            $notification->role_id = $role->id;
                            $notification->school_id = Auth::user()->school_id;
                            $notification->academic_id = YearCheck::getAcademicId();
                            if ($request->content_type == 'as') {
                                $notification->url = 'assignment-list';
                            } elseif ($request->content_type == 'st') {
                                $notification->url = 'study-metarial-list';
                            } elseif ($request->content_type == 'sy') {
                                $notification->url = 'syllabus-list';
                            } elseif ($request->content_type == 'ot') {
                                $notification->url = 'other-download-list';
                            }
                            $notification->date = date('Y-m-d');
                            $notification->message = $purpose . ' updated';
                            $notification->save();
                        }
                    }
                }
                if ($value == 'student') {
                    if (isset($request->all_classes)) {
                        $students = SmStudent::select('id', 'user_id')->where('academic_id', YearCheck::getAcademicId())->where('school_id', Auth::user()->school_id)->get();
                        foreach ($students as $student) {
                            $notification = new SmNotification;
                            $notification->user_id = $student->id;
                            $notification->role_id = 2;
                            $notification->school_id = Auth::user()->school_id;
                            $notification->academic_id = YearCheck::getAcademicId();
                            if ($request->content_type == 'as') {
                                $notification->url = 'student-assignment';
                            } elseif ($request->content_type == 'st') {
                                $notification->url = 'student-study-material';
                            } elseif ($request->content_type == 'sy') {
                                $notification->url = 'student-syllabus';
                            } elseif ($request->content_type == 'ot') {
                                $notification->url = 'student-others-download';
                            }
                            $notification->date = date('Y-m-d');
                            $notification->message = $purpose . ' updated';
                            $notification->save();
                        }
                    } else {
                        $students = SmStudent::select('id')->where('class_id', $request->class)->where('section_id', $request->section)->where('academic_id', YearCheck::getAcademicId())->where('school_id', Auth::user()->school_id)->get();
                        foreach ($students as $student) {
                            $notification = new SmNotification;
                            $notification->user_id = $student->id;
                            $notification->role_id = 2;
                            if ($request->content_type == 'as') {
                                $notification->url = 'student-assignment';
                            } elseif ($request->content_type == 'st') {
                                $notification->url = 'student-study-material';
                            } elseif ($request->content_type == 'sy') {
                                $notification->url = 'student-syllabus';
                            } elseif ($request->content_type == 'ot') {
                                $notification->url = 'student-others-download';
                            }
                            $notification->date = date('Y-m-d');
                            $notification->message = $purpose . ' updated';
                            $notification->school_id = Auth::user()->school_id;
                            $notification->academic_id = YearCheck::getAcademicId();
                            $notification->save();
                        }
                    }
                }

            }

            if ($results) {
                Toastr::success('Operation successful', 'Success');
                return redirect()->back();
            } else {
                Toastr::error('Operation Failed', 'Failed');
                return redirect()->back();
            }
        } catch (\Exception $e) {

            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function assignmentList(Request $request)
    {

        try {
            $user = Auth()->user();

            if ($user->role_id == 1) {
                SmNotification::where('user_id', $user->id)->where('role_id', 1)->update(['is_read' => 1]);
            }

            if (Auth()->user()->role_id == 1) {

                $uploadContents = SmTeacherUploadContent::where('content_type', 'as')->where('academic_id', YearCheck::getAcademicId())->where('school_id', Auth::user()->school_id)->get();

            } else {

                $uploadContents = SmTeacherUploadContent::where(function ($q) {
                    $q->where('created_by', Auth::user()->id)->orWhere('available_for_admin', 1);
                })->where('content_type', 'as')->where('academic_id', YearCheck::getAcademicId())->where('school_id', Auth::user()->school_id)->get();
            }

            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                return ApiBaseMethod::sendResponse($uploadContents->toArray(), 'null');
            }

            return view('backEnd.teacher.assignmentList', compact('uploadContents'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function studyMetarialList(Request $request)
    {

        try {
            if (Auth()->user()->role_id == 1) {

                $uploadContents = SmTeacherUploadContent::where('content_type', 'st')->where('academic_id', YearCheck::getAcademicId())->where('school_id', Auth::user()->school_id)->get();

            } else {

                $uploadContents = SmTeacherUploadContent::where(function ($q) {
                    $q->where('created_by', Auth::user()->id)->orWhere('available_for_admin', 1);
                })->where('content_type', 'st')->where('academic_id', YearCheck::getAcademicId())->where('school_id', Auth::user()->school_id)->get();

            }

            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                return ApiBaseMethod::sendResponse($uploadContents->toArray(), 'null');
            }
            return view('backEnd.teacher.studyMetarialList', compact('uploadContents'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function syllabusList(Request $request)
    {
        try {
            if (Auth()->user()->role_id == 1) {
                $uploadContents = SmTeacherUploadContent::where('content_type', 'sy')->where('academic_id', YearCheck::getAcademicId())->where('school_id', Auth::user()->school_id)->get();
            } else {
                $uploadContents = SmTeacherUploadContent::where(function ($q) {
                    $q->where('created_by', Auth::user()->id)->orWhere('available_for_admin', 1);
                })->where('content_type', 'sy')->where('academic_id', YearCheck::getAcademicId())->where('school_id', Auth::user()->school_id)->get();
            }

            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                return ApiBaseMethod::sendResponse($uploadContents->toArray(), 'null');
            }
            return view('backEnd.teacher.syllabusList', compact('uploadContents'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function otherDownloadList(Request $request)
    {

        try {
            if (Auth()->user()->role_id == 1) {
                $uploadContents = SmTeacherUploadContent::where('content_type', 'ot')->where('academic_id', YearCheck::getAcademicId())->where('school_id', Auth::user()->school_id)->get();
            } else {
                $uploadContents = SmTeacherUploadContent::where(function ($q) {
                    $q->where('created_by', Auth::user()->id)->orWhere('available_for_admin', 1);
                })->where('content_type', 'ot')->Where('created_by', Auth::user()->id)->where('academic_id', YearCheck::getAcademicId())->where('school_id', Auth::user()->school_id)->get();
            }

            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                return ApiBaseMethod::sendResponse($uploadContents->toArray(), 'null');
            }
            return view('backEnd.teacher.otherDownloadList', compact('uploadContents'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function deleteUploadContent(Request $request, $id)
    {

        try {
            $uploadContent = SmTeacherUploadContent::find($id);
            if ($uploadContent->upload_file != "") {
                unlink($uploadContent->upload_file);
            }
            $result = $uploadContent->delete();

            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                if ($result) {
                    return ApiBaseMethod::sendResponse(null, 'Content has been deleted successfully.');
                } else {
                    return ApiBaseMethod::sendError('Something went wrong, please try again.');
                }
            } else {
                if ($result) {
                    Toastr::success('Operation successful', 'Success');
                    return redirect()->back();
                } else {
                    Toastr::error('Operation Failed', 'Failed');
                    return redirect()->back();
                }
            }
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function createTeacher()
    {
        return view('backEnd.academics.add_teacher');
    }

    public function saveTeacher(Request $request)
    {
        $grade = $request->grade;
        $subject = array("English", "Mathematics", "Science");
        $medium = $request->medium;
        if ($medium === "tamil") {
            array_push($subject, "Tamil");
        } else if ($medium === "sinhala") {
            array_push($subject, "Sinhala");
        }
        if ((int) $grade > 9) {
            array_push($subject, $request->Group_one);
            array_push($subject, $request->Group_two);
            array_push($subject, $request->Group_three);
        } else {
            array_push($subject, "Geography");
        }
        $student = StudentRegistration::whereEmail($request->student_email)->first();
        if ($student) {
            if ($request->type === "api") {
                return response()->json([
                    'success' => 'OK',
                    'msg' => "Email already registered",
                ]);
            }
            Toastr::info('Email already registered', 'Info');
            return redirect()->back();
        }
        $subject = array_unique($subject);
        $new_student = new StudentRegistration();
        $new_student->first_name = $request->first_name;
        $new_student->last_name = $request->last_name;
        $new_student->gender = $request->gender;
        $new_student->date_of_birth = $request->date_of_birth;
        $new_student->grade = $grade;
        $new_student->email = $request->student_email;
        $new_student->mobile = $request->student_mobile;
        $new_student->medium = $request->medium;
        $new_student->district = $request->district;
        $new_student->subject = json_encode($subject);
        $new_student->academic_year = $request->academic_year;
        $new_student->class = $request->class;
        $new_student->age = $request->age;
        $new_student->guardian_name = $request->guardian_name;
        $new_student->guardian_email = $request->guardian_email;
        $new_student->guardian_relationship = $request->relationButton;
        $new_student->guardian_mobile = $request->guardian_mobile;
        $new_student->question = $request->how_do_know_us;
        $new_student->save();

        $new_user = new User();
        $new_user->full_name = $request->first_name . " " . $request->last_name;
        $new_user->username = $request->first_name . $request->last_name;
        $new_user->email = $request->student_email;
        $new_user->password = Hash::make($request->password);
        $new_user->usertype = "student";
        $new_user->role_id = "2";
        $new_user->save();

        if ($request->type === "api") {
            return response()->json([
                'success' => 'OK',
                'msg' => "Registration successfully",
            ]);
        }
        Toastr::success('Operation successful', 'Success');
        return redirect()->back();
    }

}