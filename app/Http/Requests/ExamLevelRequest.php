<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamLevelRequest extends FormRequest
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
            'alias' => 'required|max:191',
            'exam_level_code' => 'required|max:3',
            'status' => 'required',
        ];
    }
}
