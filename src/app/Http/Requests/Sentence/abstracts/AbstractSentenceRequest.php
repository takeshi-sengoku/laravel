<?php
namespace App\Http\Requests\Sentence\abstracts;

class AbstractSentenceRequest extends \Illuminate\Foundation\Http\FormRequest
{

    public function rules()
    {
        return [
            'sentence' => [
                'bail',
                'required',
                'min:1',
                'max:140'
            ]
        ];
    }
}
