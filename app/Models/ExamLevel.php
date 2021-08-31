<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamLevel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'exam_levels';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'alias', 'status','exam_level_code'];
    public function user_schedule()
    {
        return $this->hasMany('App\Models\UserSchedule');
    }
    public function schedule()
    {
        return $this->hasMany('App\Models\Schedule');
    }
}
