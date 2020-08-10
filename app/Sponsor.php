<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Sponsor extends Model implements Sortable, HasMedia
{
    use SortableTrait, InteractsWithMedia, LogsActivity;

    protected static $logAttributes = ['*'];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    protected $fillable = [
        'name', 'link', 'active', 'order'
    ];

    protected $casts = [
        'active' => 'boolean',
        'order' => 'integer'
    ];

    protected $appends = ['edit_url', 'delete_url', 'has_media', 'logo_url', 'logo_file_name'];

    public function getEditUrlAttribute()
    {
        return route('admin::sponsor::editForm', ['id' => $this->id]);
    }

    public function getDeleteUrlAttribute()
    {
        return route('admin::sponsor::delete', ['id' => $this->id]);
    }

    public function getHasMediaAttribute()
    {
        return $this->getFirstMedia('logo');
    }

    public function getLogoUrlAttribute()
    {
        return $this->getFirstMedia('logo') ? $this->getFirstMedia('logo')->getUrl() : '';
    }

    public function getLogoFileNameAttribute()
    {
        return $this->getFirstMedia('logo') ? $this->getFirstMedia('logo')->file_name : '';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')
            ->singleFile();
    }
}
