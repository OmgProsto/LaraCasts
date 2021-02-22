<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1> List </h1>

	<ul>
			@forelse ($projects as $project)
				<li> 
					<a href = "{{ $project->path() }}"> {{$project->title }} </a>
				</li>
			@empty
				<p> No </p>
			@endforelse
	</ul>
</body>
</html>