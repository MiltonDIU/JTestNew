<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'title' => 'required|min:5|max:255',
            'logo' => 'mimes:png,jpg,jpeg',
            'diu_logo' => 'mimes:png,jpg,jpeg',
            'diu_logo' => 'mimes:png,jpg,jpeg',
            'signature' => 'mimes:png,jpg,jpeg',
            'meta_keyword' => 'required',
            'powered' => 'required',
        ];
    }
}
