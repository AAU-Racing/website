<?php

namespace App;

use App\Traits\Orderable;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Page extends Model implements Sortable
{
    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    protected $fillable = [
        'editable', 'special', 'name', 'title', 'content', 'active'
    ];

    protected $casts = [
        'editable' => 'boolean',
        'special' => 'boolean',
        'active' => 'boolean',
        'order' => 'integer'
    ];

    protected $appends = ['edit_url', 'delete_url'];

    public function getEditUrlAttribute()
    {
        return route('admin::page::editForm', ['id' => $this->id]);
    }

    public function getDeleteUrlAttribute()
    {
        return route('admin::page::delete', ['id' => $this->id]);
    }
}
