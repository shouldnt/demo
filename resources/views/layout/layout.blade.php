<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="/css/stylesheet.css">
	<meta charset = "utf-8"/>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="csrf_token" content="{ csrf_token() }" />
</head>
<body>
	@yield('content')
</body>
</html>