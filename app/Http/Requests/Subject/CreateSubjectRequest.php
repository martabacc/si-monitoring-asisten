<?php

namespace App\Http\Requests\Subject;

use App\Http\Requests\Request;

class CreateSubjectRequest extends Request
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
            'name'        => 'required|min:6',
            'description' => 'required|alpha_spaces|min:6',
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
            'name.required'             => 'Mata kuliah harus diisi.',
            'name.min'                  => 'Mata kuliah minimal menggunakan :min karakter.',

            'description.required'      => 'Deskripsi mata kuliah harus diisi.',
            'description.alpha_spaces'  => 'Deskripsi mata kuliah hanya boleh menggunakan huruf, angka dan spasi.',
            'description.min'           => 'Deskripsi mata kuliah minimal menggunakan :min karakter.',
        ];
    }
}
