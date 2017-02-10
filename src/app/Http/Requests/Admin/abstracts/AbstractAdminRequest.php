<?php
namespace App\Http\Requests\Admin\abstracts;

class AbstractAdminRequest extends \Illuminate\Foundation\Http\FormRequest
{

    public function rules()
    {
        return [
            'screen_name' => [
                'bail',
                'required',
                'min:4',
                'max:128'
            ],
            'password' => [
                'bail',
                'required',
                'min:6',
                'max:256'
            ],
            'mail' => [
                'bail',
                'required',
                'min:6',
                'max:255',
                'mail'
            ],
            'expired' => [
                'bail',
                'required',
                'datetime'
            ]
        ];
    }
}
