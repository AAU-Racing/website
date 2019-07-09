<?php

namespace App;

use App\Traits\Orderable;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class CarouselSlide extends Model implements Sortable, HasMedia
{
    use SortableTrait, HasMediaTrait;

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

    public function registerMediaCollections()
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
