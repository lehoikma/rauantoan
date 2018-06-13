<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveVideosRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

        return [
            'name_videos' => 'required',
            'content_videos' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_videos.required' => 'Vui lòng nhập tên video',
            'content_videos.required' => 'Vui lòng nhúng video',
        ];

    }

}

