<?php

namespace App;

use App\Traits\Orderable;
use Illuminate\Database\Eloquent\Model;

class CarouselSlide extends Model
{
    use Orderable;

    protected $fillable = [
        'text', 'path', 'order'
    ];
}
