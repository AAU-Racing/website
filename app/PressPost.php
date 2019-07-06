<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class PressPost extends Model implements Sortable
{
    use SortableTrait;

    protected $fillable = [
        'title', 'content', 'active'
    ];

    public function edits() {
        return $this->hasMany('App\PressPostEdit');
    }
}
