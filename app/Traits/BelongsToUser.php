<?php

namespace App\Traits;

trait BelongsToUser
{
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}