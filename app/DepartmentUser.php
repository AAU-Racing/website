<?php

namespace App;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class DepartmentUser extends Model implements Sortable
{
    use SortableTrait, BelongsToUser, LogsActivity;

    protected static $logAttributes = ['*'];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    protected $casts = [
        'order' => 'integer'
    ];

    public function department()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }

    public function buildSortQuery()
    {
        return static::query()->where('department_id', $this->department_id);
    }
}
