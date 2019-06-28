<?php

namespace App;

use App\Traits\Orderable;
use Illuminate\Database\Eloquent\Model;

class FooterLink extends Model
{
    use Orderable;

    protected $fillable = [
        'name', 'path', 'target'
    ];
}
