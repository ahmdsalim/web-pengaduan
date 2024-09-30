<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table = 'article';
    protected $fillable = ['title','slug','author_id','thumb_image_name','content','visitor_counts','status'];

    public function users()
    {
    	return $this->belongsTo('App\Models\User','author_id');
    }
}
