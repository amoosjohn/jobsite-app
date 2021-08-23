<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ProfileUpdateRequest extends FormRequest
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
            'name'    =>  'required|string|max:255',
            'email'    =>  'required|email|max:255|unique:users,email,'.Auth::user()->id,
            'mobile'    =>  'required',
            'job_title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'started_date' => 'required',
            'industry' => 'required',
            'degree' => 'required',
            'school' => 'required',
            'completed_date' => 'required',
            'skills' => 'required',
            'cv' => 'sometimes|mimes:doc,docx,pdf|max:2000'
        ];
    }
}
