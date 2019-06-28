<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacebookPost extends Model
{
    protected $fillable = [
        'facebook_id', 'permalink_url', 'message', 'shares', 'likes'
    ];

    public function front_post(){
        return $this->morphOne('App\FrontPost', 'post');
    }

    public function images() {
        return $this->hasMany('App\FacebookPostImage');
    }
}
