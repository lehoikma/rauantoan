<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupportRequest;
use App\Models\Question;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.support');
    }

    public function saveQuestion(SupportRequest $request)
    {
        $question = Question::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'content' => $request['content'],
            'status' => 1
        ]);
        if ($question) {
            \Session::flash('alert-success', 'Gửi Tư Vấn Thành Công');
        } else {
            \Session::flash('alert-warning', 'Gửi Tư Vấn Lỗi');
        }

        return redirect()->route('form_support');
    }

//    public function mobileQuestionSend(SupportRequest $request)
//    {
//        $question = Question::create([
//            'name' => $request['name'],
//            'email' => $request['email'],
//            'phone' => $request['phone'],
//            'content' => $request['content'],
//            'status' => 1
//        ]);
//        if ($question) {
//            \Session::flash('alert-success', 'Gửi Tư Vấn Thành Công');
//        } else {
//            \Session::flash('alert-warning', 'Gửi Tư Vấn Lỗi');
//        }
//        return redirect()->route('question');
//    }

}
