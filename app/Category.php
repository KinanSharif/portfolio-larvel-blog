<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = array('name');

    public $timestamps = true;


    public function posts()
    {
        return $this->hasMany('App\Post');
    }

   public function latest_3_posts()
    {
        return $this->hasMany('App\Post')->latest()->take(3);
    }

}
