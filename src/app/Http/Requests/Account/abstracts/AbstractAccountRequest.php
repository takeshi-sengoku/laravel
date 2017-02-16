<?php
namespace App\Http\Requests\Account\abstracts;

class AbstractAccountRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function authorize () {
        return true;
    }

    public function rules()
    {
        return [
            'screen_name' => [
                'bail',
                'required',
                'min:6',
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
                'email'
            ],
            'expired' => [
                'bail',
                'required',
                'datetime'
            ]
        ];
    }
}
