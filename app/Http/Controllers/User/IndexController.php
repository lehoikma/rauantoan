<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ItemProduct;
use App\Models\News;
use App\Models\NewsCompany;
use App\Models\NewsFarm;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsCompany = News::where('category_news_id', 3)->limit(9)->orderBy('created_at', 'desc')->get();
        $newsFarm = News::where('category_news_id', 2)->limit(9)->orderBy('created_at', 'desc')->get();
        $newsFirst = News::where('category_news_id', 1)->orderBy('created_at', 'desc')->first();
        $newsList = News::where('category_news_id', 1)->limit(5)->orderBy('created_at', 'desc')->get();
        return view('user.home', [
            'newsCompany' => $newsCompany,
            'newsFarm' => $newsFarm,
            'newsFirst' => $newsFirst,
            'newsList' => $newsList
        ]);
    }

}
