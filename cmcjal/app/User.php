<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'lastname', 'type', 'status'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value) {
        if(!empty($value))
            $this->attributes['password'] = \Hash::make($value);
    }

    public function events() {
        return $this->belongsToMany('App\EventCalendar', 'assistance', 'user_id', 'event_id');
    }

    public function documentation() {
        return $this->hasOne('App\Documentation', 'id', 'documentation_id');
    }
}
