<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1> Create </h1>
	
	<form method="POST" action="/projects">
		@csrf
		<input type="text" name="title" placeholder="Title">

		<textarea name="description" placeholder="Title"></textarea>

		<button type="submit">Create</button>
	</form>
</body>
</html>