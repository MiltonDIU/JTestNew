<?php

namespace App\Http\Requests;

use App\Result;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests;
class ResultRequest extends FormRequest
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
          'result_file' => 'required|mimes:csv,txt',
        ];
    }
    public function messages()
    {
        return [
            'result_file.required|file' => 'Result file  must be selected',
            'result_file.mimes|file' => 'Result file  must be CSV format',
        ];
    }
}
