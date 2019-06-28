<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PressPost extends Model
{
    protected $fillable = [
        'title', 'content'
    ];

    public function edits() {
        return $this->hasMany('App\PressPostEdit');
    }
}
