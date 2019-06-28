<?php

namespace App;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    use BelongsToUser;

    protected $fillable = [
        'name', 'phone_number', 'primary'
    ];

    protected $casts = [
        'primary' => 'boolean'
    ];
}
