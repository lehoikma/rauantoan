<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Documents;
use App\Models\Introduces;

class IntroducesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('user.index');
    }

    public function introduce1()
    {
        $introduce = Introduces::find(1);
        return view('user.introduce1', [
            'introduce' => $introduce
        ]);
    }

    public function introduce2()
    {
        $introduce = Introduces::find(2);
        return view('user.introduce2', [
            'introduce' => $introduce
        ]);
    }

    public function introduce3()
    {
        $introduce = Introduces::find(3);
        return view('user.introduce3', [
            'introduce' => $introduce
        ]);
    }

    public function contact()
    {
        return view('user.contact');
    }
}
