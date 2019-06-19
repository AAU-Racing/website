<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'study_number', 'alumni', 'education', 'date_of_birth', 'phone_number', 'study_card_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birth' => 'date'
    ];

    public function getNameAttribute() {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function address() {
        return $this->hasOne('App\Address');
    }

    public function avatar() {
        return $this->hasOne('App\Avatar');
    }

    public function driversLicence() {
        return $this->hasOne('App\DriversLicence');
    }

    public function car() {
        return $this->hasOne('App\MemberCar');
    }

    public function contactPersons() {
        return $this->hasMany('App\ContactPerson');
    }
}
