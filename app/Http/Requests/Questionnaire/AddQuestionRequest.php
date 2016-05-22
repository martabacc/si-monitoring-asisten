<?php

namespace App\Http\Requests\Questionnaire;

use App\Http\Requests\Request;

class AddQuestionRequest extends Request
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
            'question'    => 'required|exists:questions,id',
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
            'question.required'  => 'Pertanyaan harus diisi.',
            'question.exists'    => 'Pertanyaan belum terdaftar.',
        ];
    }
}
