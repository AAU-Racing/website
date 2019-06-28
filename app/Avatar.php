<?php

namespace App;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    use BelongsToUser;

    protected $fillable = [
        'path'
    ];
}
