<?php

namespace App\Http\Controllers\Admin;

use App\Models\ItemProduct;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check())
        {
            return redirect()->route('admin_top');
        }
        return redirect()->route('form_login');
    }

    public function formLogin()
    {
        if (Auth::check())
        {
            return redirect()->route('admin_top');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('admin_top');
        }

        return redirect()->route('home_admin');
    }

    public function top()
    {
        $product = ItemProduct::all();
        $news = News::all();
        return view('admin.top_index', [
            'product' => $product,
            'news' => $news
        ]);
    }

    public function logout()
    {
        Auth::guard()->logout();

        Session::flush();

        return redirect()->route('form_login');
    }
}
