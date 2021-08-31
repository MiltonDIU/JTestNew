<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable=['question_title','question_url','listening_title','listening_url','answer_title','answer_url','is_active'];

}
