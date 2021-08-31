<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $fillable = [
        'user_id','title', 'meta_keyword','meta_description','copyright','logo','powered','diu_logo','diil_logo','signature','content','contact','admit_message'
    ];
}
