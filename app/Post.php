<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public $timestamps = true;

    protected $fillable = [
        'title', 'body', 'featured','category_id','slug','user_id'
    ];


    /**
     * @param $value
     *
     * to generate the full path for the image during the db fetching. (Amazing this)
     *
     * @return string
     */

    public function getFeaturedAttribute($value)
    {
        return asset($value);
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
