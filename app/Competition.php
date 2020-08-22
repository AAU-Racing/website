<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Competition extends Model
{
    use LogsActivity;

    protected static $logAttributes = ['*'];

    protected $fillable = [
        'name', 'year', 'country', 'link'
    ];

    protected $casts = [
        'year' => 'integer'
    ];
}
