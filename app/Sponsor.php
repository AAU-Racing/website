<?php

namespace App;

use App\Traits\Orderable;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Sponsor extends Model implements Sortable
{
    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    protected $fillable = [
        'name', 'logo_path', 'link', 'active', 'order'
    ];

    protected $casts = [
        'active' => 'boolean',
        'order' => 'integer'
    ];
}
