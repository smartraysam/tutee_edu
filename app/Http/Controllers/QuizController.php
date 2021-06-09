<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\QuizAns;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $quizs = Quiz::get();
            return view('backEnd.quiz.question', compact('quizs'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $option = ['option_A' => $request->option_0, 'option_B' => $request->option_3, 'option_C' => $request->option_2, 'option_D' => $request->option_3];
        $quiz = new Quiz();
        $quiz->quiz_medium = $request->content_medium;
        $quiz->quiz_grade = $request->content_grade;
        $quiz->quiz_subject = $request->subject;
        $quiz->quiz_type = $request->question_type;
        $quiz->quiz_question = $request->question;
        $quiz->quiz_answer = $request->answer;
        $quiz->quiz_options = json_encode($option);
        $quiz->quiz_mark = $request->marks;
        $result = $quiz->save();

        if ($result) {
            Toastr::success('Operation successful', 'Success');
            return redirect()->back();
        } else {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $quiz = Quiz::where('id', $id)->first();
        return \response()->json($quiz);
        //
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $quiz = Quiz::where('id', $id)->delete();
        if ($quiz) {
            Toastr::success('Operation successful', 'Success');
            return redirect()->back();
        } else {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function getQuiz(Request $request)
    {
        $student_id = $request->studentid;
        $grade = $request->grade;
        $medium = strtolower($request->medium);
        $subject = strtolower($request->subject);
        $quiz = Quiz::where("quiz_medium", $medium)->where("quiz_grade", $grade)->where("quiz_subject", $subject)
            ->select("id", "quiz_question", "quiz_options", "quiz_answer", "quiz_mark", "quiz_type")
            ->get();

        foreach ($quiz as $key => $value) {
            $getans = QuizAns::where("student_id", $student_id)->where('quiz_id', $value->id)->first();
            if ($getans) {
                $value->status = true;
            } else {
                $value->status = false;
            }
            # code...
        }
        if ($quiz->count() == 0) {
            return \response()->json(['msg' => "Student already answer", 'data' => $quiz]);
        }

        return \response()->json(['msg' => "ok", 'data' => $quiz]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $id = $request->id;
        $option = ['option_A' => $request->option_0, 'option_B' => $request->option_3, 'option_C' => $request->option_2, 'option_D' => $request->option_3];
        $quiz = Quiz::where('id', $id)->first();
        $quiz->quiz_medium = $request->content_medium;
        $quiz->quiz_grade = $request->content_grade;
        $quiz->quiz_subject = $request->subject;
        $quiz->quiz_type = $request->question_type;
        $quiz->quiz_question = $request->question;
        $quiz->quiz_answer = $request->answer;
        $quiz->quiz_options = json_encode($option);
        $quiz->quiz_mark = $request->marks;
        $result = $quiz->save();

        if ($result) {
            Toastr::success('Operation successful', 'Success');
            return redirect()->back();
        } else {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}