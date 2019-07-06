<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Car extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'first_year', 'last_year', 'name', 'specifications'
    ];

    public function competition()
    {
        return $this->hasMany('App\Competition');
    }

    public function getYearsAttribute()
    {
        if ($this->last_year)
        {
            if ($this->first_year == $this->last_year)
            {
                return $this->first_year;
            }
            else
            {
                return $this->first_year.'-'.$this->last_year;
            }
        }
        else
        {
            return $this->first_year.'-';
        }
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('photos');
    }
}
