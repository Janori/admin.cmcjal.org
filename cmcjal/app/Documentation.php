<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
	protected $table = 'documentation';
    protected $fillable = ['user_id', 'certificate', 'document', 'birth_certificate', ];
    protected $hidden = ['id'];

    public function user()
    {
    	return $this->belongsTo('App\User', 'id', 'documentation_id');
    }
}
