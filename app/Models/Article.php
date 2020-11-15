<?php

namespace App\Models;
use App\Models\Like;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function likes()
    {
        return $this->hasOne(Like::class);
    }
    

}
