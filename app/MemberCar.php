<?php

namespace App;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;

class MemberCar extends Model
{
    use BelongsToUser;

    protected $fillable = [
        'towbar'
    ];

    protected $casts = [
        'towbar' => 'boolean'
    ];
}
