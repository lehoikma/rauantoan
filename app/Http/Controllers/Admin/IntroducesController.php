<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveIntroducesRequest;
use App\Models\Introduces;

class IntroducesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formIntroduce1()
    {
        $data = Introduces::find(1);
        return view('admin.form_introduce_1', [
            'data' => $data
        ]);
    }

    public function formIntroduce2()
    {
        $data = Introduces::find(2);
        return view('admin.form_introduce_2', [
            'data' => $data
        ]);
    }

    public function formIntroduce3()
    {
        $data = Introduces::find(3);
        return view('admin.form_introduce_3', [
            'data' => $data
        ]);
    }

    public function saveIntroduces(SaveIntroducesRequest $request)
    {
        $newsEdit = Introduces::where('id', $request['id'])
            ->update([
                'content' => $request['content'],
            ]);
        if ($newsEdit) {
            \Session::flash('alert-success', 'Sửa Thành Công');
        } else {
            \Session::flash('alert-warning', 'Sửa Lỗi');
        }
        return redirect()->back();
    }
}
