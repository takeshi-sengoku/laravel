<?php
namespace App\Http\Requests\Bbs\abstracts;

class AbstractBbsRequest extends \Illuminate\Foundation\Http\FormRequest
{

    public function rules()
    {
        return [
            'user_id' => [
                'bail',
                'required',
                'min:1',
                'max:16'
            ],
            'message' => [
                'bail',
                'required',
                'min:1',
                'max:140'
            ]
        ];
    }
}
