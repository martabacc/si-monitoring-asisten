<?php

namespace App\Http\Requests\Questionnaire;

use App\Http\Requests\Request;

class CreateQuestionnaireRequest extends Request
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
            'title'       => 'required|min:6|alpha_spaces',
            'description' => 'required|min:6|alpha_spaces',
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
            'title.required'           => 'Judul kuisioner harus diisi.',
            'tile.min'                 => 'Judul kuisioner minimal terdiri dari :min karakter.',
            'tile.alpha_spaces'        => 'Judul kuisioner hanya boleh menggunakan angka, huruf, dan spasi',

            'description.required'     => 'Deskripsi harus diisi.',
            'description.min'          => 'Deskripsi minimal terdiri dari :min karakter.',
            'description.alpha_spaces' => 'Deskripsi hanya boleh menggunakan angka, huruf, dan spasi',
        ];
    }
}
