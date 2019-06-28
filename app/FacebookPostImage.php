<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacebookPostImage extends Model
{
    protected $fillable = [
        'image_path'
    ];

    public function post() {
        return $this->belongsTo('App\FacebookPost');
    }
}
