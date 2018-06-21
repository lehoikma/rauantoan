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
        $introduce = Introduces::find(1);
        return view('user.introduce1', [
            'introduce' => $introduce
        ]);
    }

    public function contact()
    {
        return view('user.contact');
    }
}
