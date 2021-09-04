<?php

namespace App\Http\Requests;

use App\Models\ExamLevel;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ScheduleRequest extends FormRequest
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
            'alias' => 'required',
            'exam_date' => 'required',
            'exam_venue' => 'required',
            'admit' => 'required',
            'if_refund' => 'required',
            //'exam_code' => 'required',
            'exam_venue_code' => 'required|max:2',
            'title_code' => 'required|max:4',
            'exam_duration' => 'required',
            'exam_level_id' => 'required',
        ];
    }

    public function getData(){
        $requestData = $this->only('title','alias','exam_date','exam_venue','admit','exam_venue_code','title_code','exam_duration','exam_level_id','if_refund');

        $exam_level_id = $this->input('exam_level_id');
        $examLelvel  = ExamLevel::findOrFail($exam_level_id);
        $level_id = $examLelvel->exam_level_code;
        $requestData['exam_code'] = $requestData['title_code'].$level_id.'89'.$requestData['exam_venue_code'].'0000';
        $requestData['user_id']= Auth::id();
        return $requestData;
    }
}
