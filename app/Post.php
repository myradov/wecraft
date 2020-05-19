<?php

namespace App;
use App\User;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function category(){
    	return $this->belongsTo(Category::class);
    }
    public function path(){
    	// return '/posts/' . $this->category->slug . '/' . $this->id;
    	return "/posts/{$this->category->slug}/{$this->id}";
    }
}
