<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CategoriesNews;
use App\Models\News;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listNews = CategoriesNews::orderBy('id', 'desc')->get();
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

    public function listNewsCategory($id)
    {
        $category = CategoriesNews::find($id);
        $listNews = News::where('category_news_id', $id)->paginate(15);
        return view('user.news_list_category',[
            'category' => $category,
            'listNews' => $listNews
        ]);
    }
}
