<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCalendar extends Model
{
    protected $table = 'event_calendars';
    protected $fillable = ['start','end','all_day','color','title'];
    protected $hidden = ['id'];

    public function users()
    {
    	return $this->belongsToMany('App\User', 'assistance', 'event_id', 'user_id');
    }
}