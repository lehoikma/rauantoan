<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EditNewsCompanyRequest;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\SaveNewsCompanyRequest;
use App\Http\Requests\SaveProductRequest;
use App\Models\CategoriesProduct;
use App\Models\ItemProduct;
use App\Models\NewsCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewsCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formCreateNewsCompany()
    {
        return view('admin.form_create_news_company');
    }

    public function createNewsCompany(SaveNewsCompanyRequest $request)
    {
        $image = $request->file('fileToUpload');
        $filename = time() . '.' . $image->extension();
        $image->move('upload/', $filename);

        $newsCompany = NewsCompany::create([
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
        return redirect()->route('list_news_companys');
    }

    public function listNewsCompany()
    {
        $newsCompanies = NewsCompany::orderBy('updated_at', 'desc')->get();

        return view('admin.list_news_company',[
            'newsCompanies' => $newsCompanies
        ]);
    }

    public function showEditNewsCompany($id)
    {
        $newsCompany = NewsCompany::find($id);

        if (isset($newsCompany) && !empty($newsCompany)) {

            return view('admin.edit_news_company', [
                'newsCompany' => $newsCompany,
            ]);
        }
        return redirect()->route('list_news_companys', [
            'newsCompany' => $newsCompany
        ]);
    }

    public function editNewsCompany(EditNewsCompanyRequest $request)
    {
        if (!empty($request->file('fileToUpload'))) {
            $image = $request->file('fileToUpload');
            $filename = time() . '.' . $image->extension();
            $image->move('upload/', $filename);
        } else{
            $newsCompany = NewsCompany::where('id', $request['news_company_id'])->first();
            $filename = $newsCompany['image'];
        }

        $productEdit = NewsCompany::where('id', $request['news_company_id'])
            ->update([
                'content' => $request['content_news'],
                'image' => $filename,
                'author' => $request['author'],
                'title' => $request['title_news']
            ]);
        if ($productEdit) {
            \Session::flash('alert-success', 'Sửa Tin Tức Công Ty Thành Công');
        } else {
            \Session::flash('alert-warning', 'Sửa Tin Tức Công Ty Lỗi');
        }
        return redirect()->route('list_news_companys');

    }

    public function deleteNewsCompany($id)
    {
        $newsCompany = NewsCompany::find($id);
        $delete = $newsCompany->delete();
        if ($delete) {
            \Session::flash('alert-success', 'Xoá Tin Tức Công Ty Thành Công');
        } else {
            \Session::flash('alert-warning', 'Xoá Tin Tức Công Ty Lỗi');
        }
        return redirect()->route('list_news_companys');
    }

}
