<?php

namespace App\Http\Requests\Schedule;

use App\Http\Requests\Request;

class CreateScheduleRequest extends Request
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
            'class_id'  => 'required|exists:classes,id',
            'name'      => 'required|alpha_num',
            'day'       => 'required|alpha',
            'schedule'  => 'required',
            'place'     => 'required',
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
            'class_id.required' => 'Kelas harus diisi.',
            'class_id.exists'   => 'Kelas tidak terdaftar.',

            'name.required'     => 'Judul jadwal harus diisi.',
            'name.alpha_num'    => 'Judul jadwal hanya boleh menggunakan huruf dan angka.',

            'day.required'      => 'Hari harus diisi.',
            'day.alpha'         => 'Hari tidak valid.',

            'schedule.required' => 'Waktu harus diisi.',

            'place.required'    => 'Tempat harus diisi.',
        ];
    }
}
