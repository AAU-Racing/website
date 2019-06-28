<?php

namespace App;

use App\Traits\Orderable;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use Orderable;

    protected $fillable = [
        'name', 'logo_path', 'link', 'active', 'order'
    ];
}
