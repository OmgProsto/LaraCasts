@extends ('layouts.app')

@section('content')
	<h1> Create </h1>
	
	<form method="POST" action="/projects">
		@csrf
		<input type="text" name="title" placeholder="Title">

		<textarea name="description"></textarea>

		<button type="submit">Create</button>
		<a href='/projects'>Cansel</a>
	</form>
@endsection