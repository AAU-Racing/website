<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = [
        'name', 'year', 'country', 'link'
    ];

    protected $casts = [
        'year' => 'integer'
    ];
}
