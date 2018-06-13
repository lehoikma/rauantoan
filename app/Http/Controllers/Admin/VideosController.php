<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SaveVideosRequest;
use App\Models\Videos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registerVideos()
    {
        return view('admin.register_videos');
    }

    public function saveVideos(SaveVideosRequest $request)
    {
        Videos::create([
            'name' => $request['name_videos'],
            'videos' => $request['content_videos']
        ]);
        return redirect()->route('list_videos');
    }

    public function formEditVideo($id)
    {
        $video = Videos::find($id);
        if (empty($video)) {
            return redirect()->route('list_videos');
        }

        return view('admin.edit_video', [
            'video' => $video
        ]);
    }

    public function editVideo(Request $request)
    {
        $productEdit = Videos::where('id', $request['id_video'])
            ->update([
                'name' => $request['name_videos'],
                'videos' => $request['content_videos']
            ]);
        if ($productEdit) {
            \Session::flash('alert-success', 'Sửa Video Thành Công');
        } else {
            \Session::flash('alert-warning', 'Sửa Video Lỗi');
        }
        return redirect()->route('list_videos');
    }

    public function listVideos()
    {
        $videos = Videos::orderBy('updated_at', 'desc')->get();
        return view('admin.list_videos', [
            'videos' => $videos
        ]);
    }

    public function deleteVideos($id)
    {
        $videos = Videos::find($id);
        $delete = $videos->delete();
        if ($delete) {
            \Session::flash('alert-success', 'Xoá Video Thành Công');
        } else {
            \Session::flash('alert-warning', 'Xoá Video Lỗi');
        }
        return redirect()->route('list_videos');
    }
}
