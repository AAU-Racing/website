<?php

namespace App;

use App\Traits\Orderable;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Department extends Model implements Sortable
{
    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    protected $fillable = [
        'name', 'description', 'order'
    ];

    protected $casts = [
        'order' => 'integer'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
