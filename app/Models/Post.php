<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $primaryKey = 'post_id';
	protected $table = 'posts';
 	
	public function category(){
		return $this->belongsTo('App\Models\Category' ,'category_id');
	}
	public function user(){
		return $this->belongsTo('App\Models\User' ,'user_id');
	}
	public function comment(){
		return $this->hasMany('App\Models\Comment' ,'post_id');
	}
	// public function latestCategory(){
	// 	return $this->hasOne('App\Models\Category' ,'category_id')->gruopBy('category_id');
	// }
	// public function countComment(){
	// 	return $this->belongsTo('App\Models\Comment' ,'post_id')->withCount('comment_id');
	// }
	public function dateComment(){
		return $this->hasOne('App\Models\Comment' ,'post_id')
		->orderBy('comments.created_at', 'desc');
	}

	
}
