<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'title','alias','exam_date','exam_code','exam_venue','status','admit','exam_duration','exam_venue_code','title_code','exam_level_id','if_refund'
    ];
/*
    public function users()
    {
        return $this->hasMany(Config("authorization.user-model"));
    }

    public function permissions()
    {
        return $this->hasMany('App\Permission');
    }
*/

    public function result(){
        return $this->hasOne('App\Models\Result');
    }
    public function user_schedule(){
        return $this->hasMany('App\Models\UserSchedule');
    }
    public function user()
    {
        return $this->hasManyThrough('App\Models\User', 'App\Models\UserSchedule');
    }

    public function exam_level(){
        return $this->belongsTo('App\Models\ExamLevel');
    }
    public static function ifRefund($id){
        $schedule = Schedule::find($id);

        if ($schedule->if_refund==1){
            return 1;
        }else{
            return 0;
        }
    }
}
