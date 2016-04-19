@extends('layout.layout')

@section('content')
	<div class = "wrapper">
		<div class = "header group">
			<a href="/">Home Page</a>
			<a href="/posts" style = "float:right">Blog Page</a>
		</div>

		<div class = "post">
			<h1>{{ $post->title }}</h1>
			<p>{{ $post->content }}</p>


			<form class = "modify_section" method = "POST" action = "/posts/{{ $post->id }}">

				<a class = "button" href="{{ URL::route('edit_post', $post->id) }}">Edit</a>

				<button type = "submit" class = "button">Delete</button>

				{{ method_field('DELETE') }}

				<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

			</form>
		</div>

		<div class = "comments">
			<h3>Comments: {{ $post->commentsCount() }}</h3>
			
			@foreach($post->comments as $comment)
				<div class = "comment">
					<p>{{ $comment->text }}</p>
					
					<form class = "modify_section " method= "POST" action = "/comment/{{ $comment->id }}">
						
						<a class = "button" href="/comment/{{$comment->id}}/edit">Edit</a>

						<button type = "submit" class = "button">Delete</button>

						{{ method_field('DELETE') }}

						<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

					</form>
				</div>
			@endforeach

		</div>

		<h1 class = "write-c">Write a Comments</h1>

		@if(count($errors))
			<div class = "alert">
				<ul>
					@foreach($errors->all() as $error)

						<li> {{ $error }} </li>

					@endforeach
				</ul>
			</div>

		@endif

		<form method = "POST" action = "/posts/{{ $post->id }}/notes">

			<textarea name = 'text'></textarea>
			<br/>
			<button type= 'submit'> Write </button>
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

		</form>

		
		<footer>
			<h1>GROUP: 14</h1>
		</footer>
	</div>

@stop