<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'first_year', 'last_year', 'name', 'specifications', 'current', 'image_path'
    ];

    public function competition() {
        return $this->hasMany('App\Competition');
    }
}
