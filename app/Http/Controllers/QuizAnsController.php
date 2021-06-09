<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\QuizAns;
use DB;
use Illuminate\Http\Request;

class QuizAnsController extends Controller
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
        //
    }

    public function postQuizAns(Request $request)
    {

        $ans = new QuizAns();
        $ans->student_id = $request->studentid;
        $ans->quiz_id = $request->quiz_id;
        $ans->student_ans = $request->student_ans;

        $getquiz = Quiz::where("id", $request->quiz_id)->first();
        $getans = $getquiz->quiz_answer;
        if ($getans == $request->student_ans) {
            $getmark = $getquiz->quiz_mark;
            $ans->student_mark = $getmark;
        } else {
            $ans->student_mark = 0;
        }
        $result = $ans->save();

        if ($result) {
            return \response()->json(['status' => 'ok', 'msg' => "submitted"]);
        } else {
            return \response()->json(['status' => 'fail', 'msg' => "error occur"]);
        }

    }

    public function getResult(Request $request)
    {
        $student_id = $request->studentid;
        $subject = $request->subject;
        $result = QuizAns::where("quiz_ans.student_id", $student_id)
            ->join("quiz", "quiz.id", "=", "quiz_ans.quiz_id")
            ->where("quiz.quiz_subject", $subject)
            ->select(DB::raw("SUM(quiz_ans.student_mark) as mark"), DB::raw("SUM(quiz.quiz_mark) as tmark"))->first();
        return \response()->json(['msg' => "ok", 'subject' => $subject, 'Mark' => $result->mark, 'Total' => $result->tmark]);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuizAns  $quizAns
     * @return \Illuminate\Http\Response
     */
    public function show(QuizAns $quizAns)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuizAns  $quizAns
     * @return \Illuminate\Http\Response
     */
    public function edit(QuizAns $quizAns)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuizAns  $quizAns
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuizAns $quizAns)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuizAns  $quizAns
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuizAns $quizAns)
    {
        //
    }
}