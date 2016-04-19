@extends('layout.layout')

@section('content')
	<div class = "wrapper">
		<div class = "header group">
			<li><a href="/">Home Page</a></li>
		</div>
		
		@if(count($errors))
			<div class = "alert">
				<ul>
					@foreach($errors->all() as $error)

						<li> {{ $error }} </li>

					@endforeach
				</ul>
			</div>

		@endif
		
		<form method="POST" action = "/posts">
			<p>Title</p>
			<input type = 'text' name = 'title'></input>
			<p>Body</p>
			<textarea name = 'content'></textarea>
			<br/>
			<button type = 'submit'>Post</button>

			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		</form>

		@foreach($posts as $post)
			<div class = "posts">
		        <h1><a href="/posts/{{$post->id}}">{{ $post->title }}</a></h1>
		        <p> {{ $post->content }}</p>

		        <form class = "modify_section" method = "POST" action = "/posts/{{ $post->id }}">

					<a class = "button" href="{{ URL::route('edit_post', $post->id) }}">Edit</a>

					<button type = "submit" class = "button">Delete</button>

					{{ method_field('DELETE') }}

					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

				</form>

		        <h3>{{ $post->commentsCount() }} Comments</h3>
		    </div>

	    @endforeach

		<footer>
			<h1>GROUP: 14</h1>
		</footer>
    </div>

@stop