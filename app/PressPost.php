<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class PressPost extends Model implements Sortable, HasMedia
{
    use SortableTrait, HasMediaTrait;

    protected $fillable = [
        'title', 'content', 'active'
    ];

    public function edits()
    {
        return $this->hasMany('App\PressPostEdit');
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('photos');
    }
}
