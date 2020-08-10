<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class FacebookPostImage extends Model
{
    use LogsActivity;

    protected static $logAttributes = ['*'];

    protected $fillable = [
        'image_path'
    ];

    public function post()
    {
        return $this->belongsTo('App\FacebookPost');
    }
}
