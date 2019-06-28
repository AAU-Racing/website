<?php

namespace App;

use App\Traits\Orderable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Orderable;

    protected $fillable = [
        'editable', 'special', 'name', 'title', 'content', 'order'
    ];
}
