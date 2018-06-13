<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EditNewsCompanyRequest;
use App\Http\Requests\EditNewsFarmRequest;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\SaveNewsCompanyRequest;
use App\Http\Requests\SaveNewsFarmRequest;
use App\Http\Requests\SaveProductRequest;
use App\Models\CategoriesProduct;
use App\Models\ItemProduct;
use App\Models\NewsCompany;
use App\Models\NewsFarm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewsFarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formCreateNewsFarm()
    {
        return view('admin.form_create_news_farm');
    }

    public function createNewsFarm(SaveNewsFarmRequest $request)
    {
        $image = $request->file('fileToUpload');
        $filename = time() . '.' . $image->extension();
        $image->move('upload/', $filename);

        $newsCompany = NewsFarm::create([
            'content' => $request['content_news'],
            'image' => $filename,
            'author' => $request['author'],
            'title' => $request['title_news']
        ]);
        if ($newsCompany) {
            \Session::flash('alert-success', 'Tạo Tin Tức Công Ty Thành Công');
        } else {
            \Session::flash('alert-warning', 'Tạo Tin Tức Công Ty Lỗi');
        }
        return redirect()->route('list_news_farm');
    }

    public function listNewsFarm()
    {
        $newsFarm = NewsFarm::orderBy('updated_at', 'desc')->get();

        return view('admin.list_news_farm',[
            'newsFarm' => $newsFarm
        ]);
    }

    public function showEditNewsFarm($id)
    {
        $newsFarm = NewsFarm::find($id);

        if (isset($newsFarm) && !empty($newsFarm)) {

            return view('admin.edit_news_farm', [
                'newsFarm' => $newsFarm,
            ]);
        }
        return redirect()->route('list_news_farm', [
            'newsFarm' => $newsFarm
        ]);
    }

    public function editNewsFarm(EditNewsFarmRequest $request)
    {
        if (!empty($request->file('fileToUpload'))) {
            $image = $request->file('fileToUpload');
            $filename = time() . '.' . $image->extension();
            $image->move('upload/', $filename);
        } else{
            $newsFarm = NewsFarm::where('id', $request['news_farm_id'])->first();
            $filename = $newsFarm['image'];
        }

        $newsFarmEdit = NewsFarm::where('id', $request['news_farm_id'])
            ->update([
                'content' => $request['content_news'],
                'image' => $filename,
                'author' => $request['author'],
                'title' => $request['title_news']
            ]);
        if ($newsFarmEdit) {
            \Session::flash('alert-success', 'Sửa Tin Nông Nghiệp Thành Công');
        } else {
            \Session::flash('alert-warning', 'Sửa Tin Nông Nghiệp Lỗi');
        }
        return redirect()->route('list_news_farm');

    }

    public function deleteNewsFarm($id)
    {
        $newsFarm = NewsFarm::find($id);
        $delete = $newsFarm->delete();
        if ($delete) {
            \Session::flash('alert-success', 'Xoá Tin Tức Công Ty Thành Công');
        } else {
            \Session::flash('alert-warning', 'Xoá Tin Tức Công Ty Lỗi');
        }
        return redirect()->route('list_news_farm');
    }

}
