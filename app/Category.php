<?php

namespace App;
use App\Post;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    public $table = 'categories';

    public function getRouteKeyName(){
    	return 'slug';
    }
    public function post(){
    	return $this->hasMany(Post::class);
    }

}
