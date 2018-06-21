<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CategoriesProduct;
use App\Models\ItemProduct;
use App\Models\News;

class NewsProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listNewsProduct()
    {
        $itemProduct = ItemProduct::orderBy('id', 'desc')->paginate(15);
        return view('user.news_product_list',[
            'itemProduct' => $itemProduct
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
