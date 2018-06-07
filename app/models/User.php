<?php

namespace Puppers;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

	public $timestamps = false;
	protected $hidden = array();
	protected $fillable = ['name', 'email', 'password'];

}

?>