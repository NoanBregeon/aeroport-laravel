<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>App</title>
</head>
<body>
	<main>
		@if(session('status'))
			<div>{{ session('status') }}</div>
		@endif

		@yield('content')
	</main>
</body>
</html>
