<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PressPost extends Model implements Sortable
{
    use SortableTrait, LogsActivity;

    protected static $logAttributes = ['*'];

    protected $fillable = [
        'title', 'content', 'active'
    ];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    protected $casts = [
        'active' => 'boolean',
        'order' => 'integer'
    ];

    protected $appends = ['edit_url', 'delete_url'];

    public function getEditUrlAttribute()
    {
        return route('admin::press::editForm', ['id' => $this->id]);
    }

    public function getDeleteUrlAttribute()
    {
        return route('admin::press::delete', ['id' => $this->id]);
    }
}
