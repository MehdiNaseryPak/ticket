<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['name','cat_id','image','background','description','status','genre','director','trailer','commentable','count','time'];

    public function galleries()
    {
        return $this->hasMany(MovieGallery::class);
    }

}
