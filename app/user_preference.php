<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_preference extends Model
{
	    
	protected $table="preference";
	protected $primaryKey="username";

	public function user()
	{
		return $this->belongsTo('App/Registered_user', 'username');

	}
    //
}
