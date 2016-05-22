<?php

namespace App\Http\Requests\Question;

use App\Http\Requests\Request;

class CreateQuestionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question' => 'required|min:6',
        ];
    }

    /**
     * Set custom error messages for predefined rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'question.required' => 'Pertanyaan harus diisi.',
            'question.min'      => 'Pertanyaan minimal terdiri dari :min karakter.',
        ];
    }
}
