<?php
namespace App\Http\Requests\Sentence;

class CreateRequest extends abstracts\AbstractSentenceRequest
{
    public function rules()
    {
        return [
            'sentence' => [
                'require',
                'min:1',
                'max:256',
            ],
        ];
    }
}
