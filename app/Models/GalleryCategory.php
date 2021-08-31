<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    protected $fillable=['title','slug','is_active'];

    public function gallery(){
        return $this->hasMany('App\Models\Gallery');
    }
}
