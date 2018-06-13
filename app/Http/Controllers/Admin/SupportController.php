<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EditProductRequest;
use App\Http\Requests\SaveProductRequest;
use App\Models\CategoriesProduct;
use App\Models\ItemProduct;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listQuestion()
    {
        $questions = Question::where('status', 1)->orderBy('updated_at', 'desc')->get();
        return view('admin.list_question', [
            'questions' => $questions
        ]);
    }


    public function editQuestion($id)
    {
        Question::where('id', $id)->update([
           'status' => 2
        ]);
        return redirect()->route('list_question');
    }
}
