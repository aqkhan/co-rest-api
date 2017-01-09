<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'contact_number', 'company_name', 'company_website', 'company_description', 'company_address', 'company_email', 'company_logo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function bookings() {
        return $this->hasMany('App\Booking'); 
    }

    // Mutator to encrypt password for users
    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }
}
