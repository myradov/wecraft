@extends('layouts.app')

@section('content')
	<div class="container">
			<div class="content">
				<h3 class="title">{{ $post->title }}</h3>
		      	<p class="text">{{ $post->body }}</p>
				<p class="text"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
			</div>
	</div>
@endsection