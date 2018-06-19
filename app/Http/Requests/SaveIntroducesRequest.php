<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveIntroducesRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

        return [
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Vui lòng nhập mô tả'
        ];

    }

}

