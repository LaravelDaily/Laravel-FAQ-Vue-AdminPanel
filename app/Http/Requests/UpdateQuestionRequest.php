<?php

namespace App\Http\Requests;

use App\Models\Question;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('question_edit');
    }

    public function rules()
    {
        return [
            'category_id' => [
                'integer',
                'exists:categories,id',
                'nullable',
            ],
            'tags'        => [
                'array',
            ],
            'tags.*.id'   => [
                'integer',
                'exists:tags,id',
            ],
            'title'       => [
                'string',
                'required',
            ],
            'answer'      => [
                'string',
                'nullable',
            ],
        ];
    }
}
