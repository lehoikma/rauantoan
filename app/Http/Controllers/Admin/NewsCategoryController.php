<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EditProductRequest;
use App\Http\Requests\SaveProductRequest;
use App\Models\CategoriesNews;
use App\Models\CategoriesProduct;
use App\Models\ItemProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registerNewsCategory()
    {
        $categoryNews = CategoriesNews::all();
        return view('admin.register_category_news', [
            'categoryNews' => $categoryNews
        ]);
    }

    public function saveNewsCategory(Request $request)
    {
        if ($request['name_category_news'] == '') {
            return redirect()->route('register_category_news');
        }
        CategoriesNews::create([
            'name' => $request['name_category_news']
        ]);
        return redirect()->route('register_category_news');
    }

    public function deleteNewsCategory($id)
    {
        $categoryNews = CategoriesNews::find($id);

        $categoryNews->delete();

        return redirect()->route('register_category_news');
    }

    public function showEditNewsCategory($id)
    {
        $categoryNews = CategoriesNews::where('id', $id)->first();
        if (empty($categoryNews)) {
            return redirect()->route('admin_top');
        }
        $categoryNewsList = CategoriesNews::all();
        return view('admin.edit_category_news', [
            'categoryNewsList' => $categoryNewsList,
            'categoryNews' => $categoryNews
        ]);
    }

    public function editNewsCategory(Request $request)
    {
        $categoryNews = CategoriesNews::where('id', $request['id_category_news'])->first();
        if (empty($categoryNews)) {
            return redirect()->route('admin_top');
        }
        CategoriesNews::where('id', $request['id_category_news'])
            ->update(['name' => $request['name_category_news']]);

        return redirect()->route('register_category_news');
    }
}
