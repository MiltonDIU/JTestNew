<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSchedule extends Model
{
    protected $table = 'user_schedule';
    protected $fillable = [
        'user_id', 'schedule_id', 'role_number','exam_level_id','if_refund','if_next_exam','next_schedule','previous_schedule'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function schedule()
    {
        return $this->belongsTo('App\Models\Schedule');
    }
    public function exam_level()
    {
        return $this->belongsTo('App\Models\ExamLevel');
    }
}
