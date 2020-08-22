<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class CarouselSlide extends Model implements Sortable, HasMedia
{
    use SortableTrait, InteractsWithMedia, LogsActivity;

    protected static $logAttributes = ['*'];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    protected $fillable = [
        'label'
    ];

    protected $casts = [
        'order' => 'integer'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photos')
            ->singleFile();
    }

    protected $appends = ['edit_url', 'delete_url', 'photo_url'];

    public function getEditUrlAttribute()
    {
        return route('admin::carousel::editForm', ['id' => $this->id]);
    }

    public function getDeleteUrlAttribute()
    {
        return route('admin::carousel::delete', ['id' => $this->id]);
    }

    public function getPhotoUrlAttribute()
    {
        return $this->getFirstMedia('photos')->getUrl();
    }
}
