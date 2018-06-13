<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Videos;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listVideos()
    {
        $videos = Videos::paginate(15);
        return view('user.list_videos',[
            'videos' => $videos,
        ]);
    }
}
