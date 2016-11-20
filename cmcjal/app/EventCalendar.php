<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCalendar extends Model
{
    protected $table = 'events';
    protected $fillable = ['title', 'all_day', 'start', 'end', 'color', 'credits', 'exam', 'place', 'address', 'speaker', 'institution'];
    protected $hidden = ['id'];

    public function users()
    {
    	return $this->belongsToMany('App\User', 'assistance', 'event_id', 'user_id');
    }

    public function questions()
    {
    	return $this->hasMany('App\Question', 'event_id', 'id');
    }
}