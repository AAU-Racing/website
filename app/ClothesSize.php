<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClothesSize extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'waist_width', 'shirt_size'
    ];


    public function user() {
        return $this->belongsTo('User');
    }
}
