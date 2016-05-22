<?php

namespace App\Http\Requests\Activity;

use App\Http\Requests\Request;

class CreateActivityRequest extends Request
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
            'name'      => 'required',
            'class_id'  => 'required|exists:classes,id',
            'date'      => 'required|date',
            'duration'  => 'required|numeric',
            'notes'     => 'required',
            'path_file'     => '',
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
            'name.required'     => 'Judul laporan harus diisi.',
            'name.alpha_spaces' => 'Judul laporan hanya boleh menggunakan huruf dan angka.',

            'class_id.required' => 'Kelas harus diisi.',
            'class_id.exists'   => 'Kelas tidak terdaftar.',

            'date.required'     => 'Date harus diisi.',
            'date.date'         => 'Harus menggunakan format date.',

            'duration.required' => 'Duration harus diisi.',
            'duration.numeric'  => 'Duration harus berupa angka.',

            'notes.required'    => 'Notes harus diisi.',
        ];
    }
}
