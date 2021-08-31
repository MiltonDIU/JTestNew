<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'question_title' => 'max:191',
            'question_url'   => 'mimes:pdf,jpg,png,jpeg',
            'listening_title' => 'max:191',
            'listening_url'   => 'mimes:zip,mp3,mp4,wav',
            'answer_title' => 'max:191',
            'answer_url'   => 'mimes:pdf,jpg,png,jpeg',
            'is_active' => 'required|max:1',

        ];
    }
    public function messages()
    {
        // TODO: Change the autogenerated stub
        return[
            'question_title.required' => 'The Question Title Field is Required.',
            'question_url'   => 'The Question File  must be type of:pdf,jpg,png,jpeg',
            'listening_title.required' => 'The Listening Title Field is Required.',
            'listening_url.mimes'   => 'The Listening File  must be type of :zip,mp3,mp4,wav.',
            'answer_title.required' => 'The Answer Title Field is Required.',
            'answer_url.mimes'   => 'The Answer File  must be type of:pdf,jpg,png,jpeg',
        ];
    }

}