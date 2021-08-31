<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable=['title','slug','is_active','url','gallery_category_id'];

    public function gallery_category(){
        return $this->belongsTo('App\Models\GalleryCategory');
    }
}
