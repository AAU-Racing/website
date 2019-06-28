<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrontPost extends Model
{
    protected $fillable = [
        'posted_at'
    ];

    public function post() {
        return $this->morphTo();
    }
}
