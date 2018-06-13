<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SupportRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

        return [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/[0-9]{9}/',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập Email',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'phone.required' => 'Vui lòng nhập Số Điện Thoai',
            'phone.regex' => 'Số điện thoại là số. Vui lòng nhập lại',
            'content.required' => 'Vui lòng nhập câu hỏi',
        ];

    }

}

