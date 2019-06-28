<?php

namespace App;

use App\Traits\Orderable;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use Orderable;

    protected $fillable = [
        'name', 'description', 'order'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
