<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveNewsRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

        return [
            'title_news' => 'required',
            'content_news' => 'required',
            'select_cate_news' => 'required',
            'fileToUpload' => 'required | mimes:jpeg,jpg,png'
        ];
    }

    public function messages()
    {
        return [
            'title_news.required' => 'Vui lòng nhập tên tin tức ',
            'select_cate_news.required' => 'Vui lòng nhập danh muc tin tức ',
            'content_news.required' => 'Vui lòng nhập mô tả tin tức  ',
            'fileToUpload.required' => 'Vui lòng chọn hình ảnh đại diện cho tin tức ',
            'fileToUpload.mimes' => 'Vui lòng chọn hình lại định dạng file ảnh',
        ];

    }

}

