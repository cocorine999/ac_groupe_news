<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'commentaire','commentaire_id','user_id','post_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function post()
    {
        return $this->belongsTo('App\Post', 'post_id')->where(['status'=>true,'is_approved'=>true]);
    }

    public function reply_commentaires()
    {
        return $this->hasMany('App\Comment', 'commentaire_id');
    }

    public function replied()
    {
        return $this->belongsTo('App\Comment', 'commentaire_id');
    }

    
    public function scopeAuthorComment($query){
        return $this->post->where('user_id',$query);
    }
}
