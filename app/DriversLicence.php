<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriversLicence extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'license_number'
    ];


    public function user() {
        return $this->belongsTo('User');
    }
}
