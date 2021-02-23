@extends ('layouts.app')

@section('content')
	<h1> List </h1>
	<a href='/projects/create'>Create</a>
	<ul>
			@forelse ($projects as $project)
				<li> 
					<a href = "{{ $project->path() }}"> {{$project->title }} </a>
				</li>
			@empty
				<p> No </p>
			@endforelse
	</ul>
@endsection