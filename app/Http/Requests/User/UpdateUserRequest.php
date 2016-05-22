<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class UpdateUserRequest extends Request
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
            'name'      => 'required|min:6|alpha_spaces',
            'password'  => 'required|min:6'
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
            'name.required'     => 'Nama harus diisi.',
            'name.min'          => 'Nama minimal :min karakter.'
            'name.alpha_spaces' => 'Nama hanya boleh menggunakan huruf dan angka.',

            'password.required' => 'Password harus diisi.',
            'password.min'      => 'Password minimal menggunakan :min karakter.',
        ];
    }
}
