<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use Notifiable, HasRoles, InteractsWithMedia;

    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'study_number', 'alumni', 'education', 'date_of_birth', 'phone_number', 'study_card_number'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birth' => 'date',
        'alumni' => 'boolean',
    ];

    public function getNameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function getFormattedDateOfBirthAttribute()
    {
        return $this->date_of_birth ? $this->date_of_birth->format('d-m-Y') : '';
    }

    public function address()
    {
        return $this->hasOne('App\Address');
    }

    public function driversLicence()
    {
        return $this->hasOne('App\DriversLicence');
    }

    public function car()
    {
        return $this->hasOne('App\MemberCar');
    }

    public function contactPersons()
    {
        return $this->hasMany('App\ContactPerson');
    }

    public function departments()
    {
        return $this->belongsToMany('App\Deparment')->withTimestamps();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->singleFile();
    }
}
