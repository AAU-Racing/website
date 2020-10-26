<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Department extends Model implements Sortable
{
    use SortableTrait, LogsActivity;

    protected static $logAttributes = ['*'];

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

    protected $appends = ['edit_url', 'delete_url', 'users'];

    public function getEditUrlAttribute()
    {
        return route('admin::department::editForm', ['id' => $this->id]);
    }

    public function getDeleteUrlAttribute()
    {
        return route('admin::department::delete', ['id' => $this->id]);
    }

    public function users()
    {
        return $this->hasMany('App\DepartmentUser');
    }

    public function getUsersAttribute()
    {
        return $this->users()->get();
    }
}
