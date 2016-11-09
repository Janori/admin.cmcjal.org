<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $table = 'questions';
	protected $fillable = ['event_id', 'title', 'options', 'correct'];
	protected $hidden = ['id'];

	public function event()
	{
		return $this->belongsTo('App\EventCalendar');
	}
}
