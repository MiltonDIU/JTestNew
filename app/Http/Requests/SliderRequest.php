<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'page_name' => 'required|max:30',
            'title' => 'max:100',
            'slug' => 'max:191',
            'is_active' => 'required|max:1',
            'link_url' => 'max:200',
            'link_text' => 'max:50',
//            'img_url.*' => 'size:1024|image|mimes:jpeg,png,jpg,gif|max:1024',
            'img_url' => 'image|max:1024|mimes:jpeg,png,jpg|'
        ];
    }
    public function messages()
    {
        return [
            'img_url.max' => 'Slider image must be under 1MB',
            'result_file.mimes' => 'Result file  must be jpeg,png,jpg format',
        ];
    }
}
