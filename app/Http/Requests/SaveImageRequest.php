<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveImageRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

        return [
            'select_cate_image' => 'required',
            'fileToUpload' => 'required | mimes:jpeg,jpg,png,gif'
        ];
    }

    public function messages()
    {
        return [
            'select_cate_image.required' => 'Vui lòng chọn danh mục hình ảnh',
            'fileToUpload.required' => 'Vui lòng chọn hình ảnh',
            'fileToUpload.mimes' => 'Vui lòng chọn hình lại định dạng file ảnh',
        ];

    }

}

