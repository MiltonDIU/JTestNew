<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'mobile' => 'required',
            'gender' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'dob' => 'required|date_format:Y/m/d|before:today',
            'nationality' => 'required',
            'religion_id' => 'required',
            'identity_type' => 'required',
            'identity' => 'required|unique:profiles,identity,'.$this->input('identity'),
            //'identity_file' => 'required',
            'identity_file' => 'required|image|mimes:jpeg,jpg,png|max:1024',

            'address' => 'required',
            //'signature' => 'required',
            'signature' => 'required|image|mimes:jpeg,jpg,png|max:200',
            'avatar' => 'required|image|mimes:jpeg,jpg,png|max:300',
            'schedule_id' => 'required',
            'exam_level_id' => 'required',
            'email' => 'required|string|email|max:191',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'identity.unique' => 'Your NID/Passport/Birth Registration number already exists, Please contact 01847140018.',
        ];
    }
}
