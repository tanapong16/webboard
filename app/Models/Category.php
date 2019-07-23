<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'category_id';
    protected $table = 'categorys';
    protected $dates = ['deleted_at'];

    public function post(){
    	return $this->hasMany('App\Models\Post' ,'category_id');
    }

    public function latestPost(){
    	return $this->hasOne('App\Models\Post' ,'category_id')->orderBy('post_id', 'desc');
    }

    public function countComment(){
    	return $this->hasManyThrough(
    		'App\Models\Comment' ,
    		'App\Models\Post',
    		'category_id',
    		'post_id'

    	);
    }

     public function userComment(){
    	return $this->hasOneThrough(
    		'App\Models\Comment' ,
    		'App\Models\Post',
    		'category_id',
    		'post_id'

    	)
        ->latest();
    }


}
