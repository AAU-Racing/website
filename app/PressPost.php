<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PressPost extends Model implements Sortable, HasMedia
{
    use SortableTrait, InteractsWithMedia;

    protected $fillable = [
        'title', 'content', 'active'
    ];

    public function edits()
    {
        return $this->hasMany('App\PressPostEdit');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photos');
    }
}
