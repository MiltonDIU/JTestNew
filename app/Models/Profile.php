<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'father_name', 'mother_name','dob','nationality','religion_id','identity_type','identity','identity_file','address','signature','avatar'
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function religion()
    {
        return $this->belongsTo('App\Models\Religion');
    }
    public function permissions()
    {
        return $this->hasMany('App\Models\Permission');
    }
}
