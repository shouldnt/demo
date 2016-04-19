@extends('layout.layout')

@section('content')
	<div class = "wrapper">
		<div class = "header group">
			<a href="/">Home Page</a>
			<a href="/posts" style = "float:right;">Blog Page</a>
		</div>

		<h1>EDIT A COMMENT</h1>

		<form method = "POST" action = "/comment/{{ $comment->id }}">
			<textarea name = 'text'>{{ $comment->text }}</textarea>
			<br/>
			<button type= 'submit'> Update  </button>

			<button><a href="{{ URL:: route('post', $comment->post_id)}}"> Back  </a></button>

			{{ method_field('PATCH') }}

			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		</form> 

		
		<footer>
			<h1>GROUP: 14</h1>
		</footer>

	</div>
@stop