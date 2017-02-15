<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" >
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
@yield('meta')

	<title>サンプルサイト | Sample Site</title>

	<link rel="stylesheet" href="/css/skyblue.min.css">
	<link rel="stylesheet" href="/css/docs.css">
	<link rel="stylesheet" href="/google-code-prettify/prettify.css">

	<link rel="stylesheet" href="/css/sample.css">

	<link rel="stylesheet" href="/css/mpyw.css">
</head>
<body>

<div class="container">
@yield('content')
</div>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="/js/jquery.sticky-kit.min.js"></script>
@yield('js_lib')
@yield('js')
</body>
</html>
