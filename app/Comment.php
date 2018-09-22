<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	public $timestamps = false;
	protected $fillable = [
		'body','url','comment_id','commentable_type','user_id',
	];
    
   public function commentable()
   {
   	return $this->morphTo();
   }
   public function user()
   {
   	return $this->hasOne('App\User','id','user_id');
   }
}
