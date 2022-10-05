<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset=UTF-8>
	<title>@yield('title')</title>
</head>
<body>
	@section('sidebar')
		// Sidebar
	@show

	<div class="container">
		@yield('content')
	</div>
</body>
</html>