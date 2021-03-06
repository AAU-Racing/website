<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class FooterLink extends Model implements Sortable
{
    use SortableTrait, LogsActivity;

    protected static $logAttributes = ['*'];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    protected $fillable = [
        'name', 'path', 'target', 'active'
    ];

    protected $casts = [
        'order' => 'integer',
        'active' => 'boolean'
    ];

    protected $appends = ['edit_url', 'delete_url', 'formatted_target'];

    public function getEditUrlAttribute()
    {
        return route('admin::footer_link::editForm', ['id' => $this->id]);
    }

    public function getDeleteUrlAttribute()
    {
        return route('admin::footer_link::delete', ['id' => $this->id]);
    }

    public function getFormattedTargetAttribute() {
        if ($this->target == '_blank') {
            return 'New tab';
        }
        else if ($this->target == '_self') {
            return 'Current tab';
        }
        else {
            return 'Invalid target';
        }
    }
}
