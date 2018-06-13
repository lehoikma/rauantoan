<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCompany;
use App\Models\NewsFarm;

class NewsFarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listNewsFarm()
    {
        $listNewsFarm = NewsFarm::orderBy('id','desc')->paginate(10);
        return view('user.news_farm_list',[
            'listNewsFarm' => $listNewsFarm
        ]);
    }

    public function detail($title, $id)
    {
        $newsFarm = NewsFarm::find($id);
        $newsFarmFollow = NewsFarm::all()->all(3);
        return view('user.news_farm_detail', [
            'newsFarm' => $newsFarm,
            'newsFarmFollow' => $newsFarmFollow
        ]);
    }

}
