<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'sub_title', 'slug', 'description', 'is_approved', 'status', 'view_count', 'user_id',
    ];

    public function author()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function tags()
    {
        return  $this->belongsToMany('App\Tag', 'post_tags', 'post_id', 'tag_id')->withTimestamps();
    }

    public function categories()
    {
        return  $this->belongsToMany('App\Category', 'category_posts', 'post_id', 'category_id')->withTimestamps();
    }

    public function favorite_to_users()
    {
        return  $this->belongsToMany('App\User', 'post_user', 'post_id', 'user_id')->withTimestamps();
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
    public function commentaires(){
        return $this->hasMany('App\Comment', 'post_id');
    }

    public function scopeApproved($query){
        return $query->where('is_approved',true);
    }

    public function scopePublished($query){
        return $query->where('status',true);
    }

    public function scopePendingPosts($query){
        return $query->where(['status'=>true,'is_approved'=>false]);
    }

    public function scopeNotApproved($query){
        return $query->where('is_approved',false);
    }

    public function scopeNotPublished($query){
        return $query->where(['status'=>false,'is_approved'=>false]);
    }

    public function scopeListPosts($query){
        return $query->where(['status'=>true,'is_approved'=>true]);
    }
}