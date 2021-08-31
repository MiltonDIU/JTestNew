<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'title','alias','content','status','user_id','notice_category_id'
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

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function notice_category(){
        return $this->belongsTo('App\Models\NoticeCategory');
    }
}
