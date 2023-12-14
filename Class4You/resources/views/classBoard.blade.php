<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="/css/common.css">
	<title>classBoard</title>
	<script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
	

		{{-- @yield('classBoardMain') --}}
		
		<div id="app">
			<Header-Component></Header-Component>
			@yield('classBoardMain')
			<Footer-Component></Footer-Component>
		</div>
</body>
</html>