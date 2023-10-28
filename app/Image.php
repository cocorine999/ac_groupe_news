<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'url', 'imageable_id', 'imageable_type',
    ];

    public function images()
    {
        return  $this->morphTo();
    }
}