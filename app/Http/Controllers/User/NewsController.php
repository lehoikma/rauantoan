<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCompany;
use App\Models\NewsFarm;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listNews = News::orderBy('id', 'desc')->paginate(10);
        return view('user.news_list',[
            'listNews' => $listNews
        ]);
    }

    public function detail($title, $id)
    {
        $news = News::find($id);
        $newsFollow = News::limit(3)->get();
        return view('user.news_detail', [
            'news' => $news,
            'newsFollow' => $newsFollow
        ]);
    }


}
