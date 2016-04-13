<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class CreateUserRequest extends Request
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
            'username'  => 'required|min:6|alphanum|unique:users,username',
            'name'      => 'required|alphanum',
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
            'username.required' => 'Username harus diisi.',
            'username.unique'   => 'Username sudah terpakai.',
            'username.alphanum' => 'Username hanya boleh menggunakan huruf dan angka.',
            'username.min'      => 'Username minimal menggunakan :min karakter.',

            'name.required'     => 'Name harus diisi.',
            'name.alphanum'     => 'Name hanya boleh menggunakan huruf dan angka.',

            'password.required' => 'Password harus diisi.',
            'password.min'      => 'Password minimal menggunakan :min karakter.',
        ];
    }
}
