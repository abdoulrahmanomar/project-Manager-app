<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projectUser extends Model
{
	protected $table= 'project_user';

	protected $fillable = [
		'project_id','user_id',
	];
    //
}
