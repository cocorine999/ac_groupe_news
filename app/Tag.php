<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug'
    ];

    public function posts(){
        return  $this->belongsToMany('App\Post','post_tags','tag_id','post_id')->where(['status'=>true,'is_approved'=>true]);
    }
}