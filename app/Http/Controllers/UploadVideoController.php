<?php

namespace App\Http\Controllers;

use App\UploadVideo;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $video_list = UploadVideo::get();
        return view('backEnd.teacher.uploadVideo', compact('video_list'));
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
    public function uploadVideo(Request $request)
    {
        try {
            $this->validate($request, [
                'content_title' => 'required',
                'content_medium' => 'required',
                'content_grade' => 'required',
                'content_subject' => 'required',
                'thumbnail' => 'required',
            ]);

            if ($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');
                $thumbnail = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('public/uploads/upload_thumbnail/', $thumbnail);
                $thumbnail = 'public/uploads/upload_thumbnail/' . $thumbnail;
            }
            $fileName = $request->filepath;
            $video = new UploadVideo;
            $video->user_id = Auth::user()->id;
            $video->content_title = ucfirst($request->content_title);
            $video->content_medium = strtolower($request->content_medium);
            $video->content_grade = $request->content_grade;
            $video->content_subject = strtolower($request->content_subject);
            $video->upload_file = $fileName;
            $video->video_thumbnail = $thumbnail;
            $video->upload_date = date('Y-m-d H:i:s');
            $video->save();
            $file = new Filesystem;
            $file->cleanDirectory('storage/app/chunks');
            Toastr::success('New video added', 'Success');
            return redirect()->back();
        } catch (\Throwable $th) {
            \Log::info($th);
            Toastr::error('Fail', 'Error');
            return redirect()->back();
        }
    }

    public function createImage($img, $folderPath)
    {
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.' . $image_type;
        file_put_contents($file, $image_base64);
        return $file;
    }

    public function getVideocontent(Request $request)
    {
        $medium = strtolower($request->medium);
        $grade = $request->grade;
        $video_contents = UploadVideo::where("content_medium", $medium)
            ->where("content_grade", $grade)
            ->where("active_status", 1)
            ->orderBy('content_subject', 'ASC')
            ->paginate(20);
        return response()->json([
            'status' => 'OK',
            'data' => $video_contents,
        ]);
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
     * @param  \App\UploadVideo  $uploadVideo
     * @return \Illuminate\Http\Response
     */
    public function show(UploadVideo $uploadVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UploadVideo  $uploadVideo
     * @return \Illuminate\Http\Response
     */
    public function editVideo(Request $request)
    {

        $editVideo = UploadVideo::where("id", $request->id)->first();
        $editVideo->content_title = ucfirst($request->title);
        if ($request->active) {
            $editVideo->active_status = 1;
        } else {
            $editVideo->active_status = 0;
        }

        $editVideo->save();
    }
    public function getVideo(Request $request)
    {
        $video = UploadVideo::where("id", $request->id)->first();
        return response()->json($video, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UploadVideo  $uploadVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UploadVideo $uploadVideo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UploadVideo  $uploadVideo
     * @return \Illuminate\Http\Response
     */
    public function deleteVideo(Request $request)
    {
        \Log::info($request->id);
        $video = UploadVideo::findorfail($request->id);
        $video->delete();
        return response()->json(['status' => true, 'message' => "Admin deleted successfully."]);
    }
}