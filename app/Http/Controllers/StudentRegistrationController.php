<?php

namespace App\Http\Controllers;

use App\StudentRegistration;
use App\User;
use Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontEnd.studentregistration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $new_student->academic_year = date("Y");
        $new_student->class = "null";
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

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(StudentRegistration $studentRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentRegistration $studentRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentRegistration $studentRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentRegistration $studentRegistration)
    {
        //
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if ((Auth::attempt(['email' => $email, 'password' => $password]))) {
            $student = StudentRegistration::whereEmail($email)->first();
            return response()->json([
                'success' => "OK",
                'student_info' => $student,
            ]);
        } else {
            return response()->json([
                "success" => false,
                "message" => "These credentials do not match our records.",
            ]);
        }
        //
    }

}