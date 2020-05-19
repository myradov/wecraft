@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="content">
			<form method="POST" action="{{$post->path()}}">
				@csrf
				@method('PUT')
				<div class="form-group col-7">
					<div class="form-row mb-4">
					    <label for="title">Job title</label>
					    <input type="text" name="title" class="form-control" id="title" placeholder="Input title" value="{{ $post->title }}">
					</div>
					<div class="form-group">
					    <label for="categories">Job Category</label>
					    <select class="form-control" name="categories" id="categories">
					    	@foreach(App\Category::all() as $category)
					      		<option value="{{ $post->category->id }}">{{ $post->category->name }}</option>
					      	@endforeach
					    </select>
					</div>
					<div class="form-row mb-4">
					    <label for="description">Job description</label>
					    <input type="text" name="description" class="form-control" id="description" placeholder="Input description" 
					    value="{{ $post->description }}">
					</div>
					<div class="input-group mb-4">
						<div class="input-group-prepend">
						    <label class="input-group-text" for="body">Job full details</label>
						</div>
						<textarea class="form-control" name="body" id="body" aria-label="With textarea">{{ $post->body }}</textarea>
					</div>
					<button type="submit" class="btn btn-primary mt-4">Update</button>
				</div>
			</form>	
		</div>
	</div>
@endsection