<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Result extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'results';

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
    protected $fillable = ['schedule_id','student_id','name','test_year', 'dob_year','dob_month','dob_day','test_level','result','total_score','is_disqualified','comment'];

    public function schedule(){
        return $this->belongsTo('App\Models\Schedule');
    }
}
