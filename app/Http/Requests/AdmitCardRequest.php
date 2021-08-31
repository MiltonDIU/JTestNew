<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdmitCardRequest extends FormRequest
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
            'identity' => 'required',
            'dobYear' => 'required',
            'dobMonth' => 'required',
            'dobDay' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'identity.required' => 'Enter the Passport Number or Registration Number that you can used at the time of registration ',
        ];
    }
}
