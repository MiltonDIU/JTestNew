<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
            'title' => 'required|max:191',
            'gallery_category_id' => 'required',
            'slug' => 'max:191',
            'is_active' => 'required|max:1',
            'url' => 'required',
            'url.*' => 'image|mimes:jpeg,png,jpg,gif|max:20480'
        ];
    }
}
