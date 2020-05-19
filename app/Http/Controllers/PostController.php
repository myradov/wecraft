<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;

class PostController extends Controller
{
	public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Category $category){
        if($category->exists){
            $posts = $category->post()->latest();
        }
        else{
            $posts = Post::latest();
        }
        //  if($categorySlug){
        //     // $posts = $category->post()->latest();
        //     $categoryId = Category::where('slug', $categorySlug)->first()->id;
        //     $posts = Post::where('category_id', $categoryId)->latest();
        // }
        // else{
        //     $posts = Post::latest();
        // }
       
    	if($username = request('by')){
    		$user = User::where('name', $username)->firstOrFail();
    		$posts->where('user_id', $user->id);
    	}
    	$posts = $posts->latest()->get();
        
    	
        return view('posts.index', compact('posts'));
    }

    public function show($category, Post $post){
    	return view('posts.show', compact('post'));
    }

    public function create(){
    	return view('posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(){
    	$post = new Post(request()->validate([
    		'title' => 'required|min:3',
    		'description' => 'required|max:255',
    		'body' => 'required',
            'category_id' => 'exists:categories,id',
    	]));
    	$post->user_id = auth()->id();
        $post->category_id = request('categories');
    	$post->save();
    	return redirect(route('posts.index'));
    }

    public function edit($category, Post $post){
    	return view('posts.edit', compact('post'));
    }

    public function update($category, Post $post){
        $post->update(request()->validate([
            'title' => 'required|min:3',
            'description' => 'required|max:255',
            'body' => 'required',
            'category_id' => 'exists:categories,id'
        ]));
        // return redirect('/posts/' . $post->category->slug . '/' . $post->id);
        return redirect($post->path());
    }









}
