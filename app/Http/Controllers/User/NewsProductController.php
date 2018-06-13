<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CategoriesProduct;
use App\Models\ItemProduct;
use App\Models\News;
use App\Models\NewsCompany;
use App\Models\NewsFarm;

class NewsProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listNewsProduct()
    {
        $listNewsProduct = ItemProduct::orderBy('id', 'desc')->paginate(10);
        return view('user.news_product_list',[
            'listNewsProduct' => $listNewsProduct
        ]);
    }

    public function detail($title, $id)
    {
        $itemProduct = ItemProduct::find($id);
        $itemProductFollows = ItemProduct::limit(6)->get();
        return view('user.news_product_detail', [
            'itemProduct' => $itemProduct,
            'itemProductFollows' => $itemProductFollows
        ]);
    }


    public function listNewsProductCategory($id)
    {
        $category = CategoriesProduct::find($id);
        $itemProduct = ItemProduct::where('category_product_id', $id)->paginate(15);

        return view('user.news_product_list_category',[
            'category' => $category,
            'itemProduct' => $itemProduct
        ]);
    }

}
