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
        'editable', 'special', 'name', 'title', 'content'
    ];

    protected $casts = [
        'editable' => 'boolean',
        'special' => 'boolean',
        'order' => 'integer'
    ];

    protected $appends = ['edit_url'];

    public function getEditUrlAttribute() {
        return route('admin::page::editForm', ['id' => $this->id]);
    }
}
