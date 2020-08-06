<?php

namespace App;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;

class DriversLicense extends Model
{
    use BelongsToUser;

    protected $fillable = [
        'license_number'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}