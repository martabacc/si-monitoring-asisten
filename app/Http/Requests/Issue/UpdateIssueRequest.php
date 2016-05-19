<?php

namespace App\Http\Requests\Issue;

use App\Http\Requests\Request;

class UpdateIssueRequest extends Request
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
            'activity_id'  => 'required|exists:classes,id',
            'problem'      => 'required',
            'urgency'      => 'required|numeric|max:2|min:0',
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
            'activity_id.required'   => 'ID Aktivitas harus diisi.',
            'activity_id.exists'     => 'Aktivitas tidak terdaftar.',

            'problem.required'       => 'Problem harus diisi.',

            'urgency.required'       => 'Urgency harus diisi.',
            'urgency.numeric'        => 'Urgency tidak valid.',
            'urgency.max'            => 'Urgency tidak valid.',
            'urgency.min'            => 'Urgency tidak valid.',
        ];
    }
}
