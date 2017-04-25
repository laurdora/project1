<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table="posts";

	//Define Post belongs to one user example: one post only has one user_id
	public function user()
	{
		return $this->belongsTo('App\Registered_user');
	}
    
}
