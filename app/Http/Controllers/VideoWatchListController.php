<?php

namespace App\Http\Controllers;

use App\VideoWatchList;
use Illuminate\Http\Request;

class VideoWatchListController extends Controller
{

    public function getStudentWatchlist(Request $request)
    {
        $student = $request->student_id;
        $medium = strtolower($request->medium);
        $grade = $request->grade;
        $watch_list = VideoWatchList::where("video_watch_lists.student_id", $student)
            ->join("upload_videos", "upload_videos.id", "=", "video_watch_lists.video_id")
            ->where("upload_videos.content_medium", $medium)
            ->where("upload_videos.content_grade", $grade)
            ->select("video_watch_lists.video_id", "upload_videos.content_title")
            ->get();
        if ($watch_list) {
            return response()->json([
                'status' => 'OK',
                'data' => $watch_list,
            ]);
        } else {
            return response()->json([
                'status' => 'OK',
                'data' => [],
            ]);
        }
    }

    public function addWatchList(Request $request)
    {
        $list = VideoWatchList::create([
            'student_id' => $request->student_id,
            'video_id' => $request->video_id,
        ]);
        $list->save();
        return response()->json([
            'status' => 'OK',
            'msg' => "watch added",
        ]);
    }

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
     * @param  \App\VideoWatchList  $videoWatchList
     * @return \Illuminate\Http\Response
     */
    public function show(VideoWatchList $videoWatchList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VideoWatchList  $videoWatchList
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoWatchList $videoWatchList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VideoWatchList  $videoWatchList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoWatchList $videoWatchList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VideoWatchList  $videoWatchList
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoWatchList $videoWatchList)
    {
        //
    }
}