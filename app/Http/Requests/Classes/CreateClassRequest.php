<?php

namespace App\Http\Requests\Classes;

use App\Http\Requests\Request;

class CreateClassRequest extends Request
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
            'subject_id' => 'required:exists:subjects,id',
            'class'      => 'required|alpha_num',
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
            'subject_id.required' => 'Mata kuliah harus diisi.',
            'subject_id.exists'   => 'Mata kuliah tidak terdaftar.',

            'class.required'      => 'Nama kelas harus diisi.',
            'class.alpha_num'     => 'Nama kelas hanya boleh menggunakan huruf dan angka.',
        ];
    }
}
