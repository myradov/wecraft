@extends('layouts.app')

@section('content')
	<div class="container d-flex">
		<div class="content">
			@forelse($posts as $post)
				<div class="card-group" style="width: 50em;">
					<div class="card mb-2">
					    <div class="card-body">
					      {{-- 	<h4 class="card-title"><a href="/posts/{{ $post->category->slug }}/{{ $post->id }}" class="card-link">{{ $post->title }}</a></h4> --}}
					      	<h4 class="card-title"><a href="{{ $post->path()}}" class="card-link">{{ $post->title }}</a></h4>
					      	<p class="card-text">{{ $post->description }}</p>
					      	<p class="card-text"><small class="text-muted">{{ $post->created_at }}</small></p>
					      	<small>{{ $post->category->name }}</small>
					    </div>
					</div>
				</div>
				@empty
				<h4 class="title">No posts yet!!!</h4>
			@endforelse
		</div>
		<div class="content w-25">
			<ul class="list-group">
				@foreach(App\Category::all() as $category)
			  		<li class="list-group-item"><a href="/posts/{{ $category->slug }}">{{ $category->name }}</a></li>
			  	@endforeach
			</ul>
		</div>
	</div>
@endsection

@section('second-content')
<div class="container">
	<div class="content">
		<div class="row">
			<div class="col">
				<h1>Programming Jobs</h1>
				@foreach($lists as $list)
					<h2><a href="{{$list->path()}}">{{ $list->title }}</a></h2>
					<p>{{ $list->description }}</p>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection