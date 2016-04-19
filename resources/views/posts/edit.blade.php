@extends('layout.layout')

@section('content')
	<div class = "wrapper">
		<div class = "header group">
			<a href="/">Home Page</a>
			<a href="/posts" style = "float:right;">Blog Page</a>
		</div>

		<h1>EDIT</h1>

		<form method="POST" action = "/posts/{{ $post->id }}">
			<p>Title</p>
			<input type = 'text' name = 'title' value = "{{ $post->title }}"></input>
			<p>Body</p>
			<textarea name = 'content'>{{ $post->content }}</textarea>
			<br/>
			<button type = 'submit'>Update</button>
			<button><a href="{{ URL::route('post', $post->id)}}"> Back  </a></button>

			{{ method_field('PATCH') }}
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		</form>

		
		<footer>
			<h1>GROUP: 14</h1>
		</footer>

	</div>

@stop