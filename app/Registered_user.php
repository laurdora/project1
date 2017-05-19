<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Input;
use Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Registered_user extends Authenticatable
{
    //
	protected $table="registered_users";

	//Define user can have many posts example:many post belongs to an user_id
    public function posts()
    {
    	return $this->hasMany('App\Post');
    }

    public function preference()
    {
    	return $this->hasOne('App\user_preference', 'username');
    }
}
