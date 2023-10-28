<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug','image',
    ];

    public function posts(){
        return  $this->belongsToMany('App\Post','category_posts','category_id','post_id')->where(['status'=>true,'is_approved'=>true]);
    }
}