<?php

namespace App;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;

class PressPostEdit extends Model
{
    use BelongsToUser;

    protected $fillable = [
        'title', 'content'
    ];

    public function post() {
        return $this->belongsTo('App\PressPost');
    }
}
