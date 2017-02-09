<?php
namespace App\Http\Requests\User\abstracts;

class AbstractUserRequest extends \Illuminate\Foundation\Http\FormRequest
{

    public function rules()
    {
        return [
            'name' => [
                'bail',
                'required',
                'min:6',
                'max:128'
            ],
            'password' => [
                'bail',
                'required',
                'min:6',
                'max:255'
            ],
            'mail' => [
                'bail',
                'required',
                'min:6',
                'max:255',
                'mail'
            ],
            'user_type' => [
                'bail',
                'required',
                'user_type'
            ],
            'hide_name' => [
                'bail',
                'required',
                'hide_type'
            ],
            'hidd_mail' => [
                'bail',
                'required',
                'hide_type'
            ],
            'expired' => [
                'bail',
                'required',
                'datetime'
            ]
        ];
    }
}
