<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" >
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">

	<title>サンプルサイト | Sample Site</title>

	<link rel="stylesheet" href="/css/skyblue.min.css">
	<link rel="stylesheet" href="/css/docs.css">
	<link rel="stylesheet" href="/google-code-prettify/prettify.css">

	<link rel="stylesheet" href="/css/sample.css">

	<!--[if lt IE 9]>
		<script type="text/javascript" src="demo/ie/htmlshiv.js"></script>
		<script type="text/javascript" src="demo/ie/respond.src.js"></script>
	<![endif]-->
</head>
<body>

<div class="bg-dark padding-y-20">
	<div class="container text-center">
		<h1>お知らせ掲示板</h1>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col md-3">
			<div class="sidemenu js-sidemenu">
				<div>
					<h6>メニュー</h6>
					<div>
						<a href="{{ route('bbs@create') }}">新規投稿</a>
					</div>
				</div>

				<hr>
				<div>
					<h6>管理者メニュー</h6>
					<div>
						<a href="{{ route('user@list') }}">ユーザ一覧</a>
						<a href="{{ route('user@create') }}">ユーザ追加</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col md-9 float-right">
@yield('content')
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="/js/jquery.sticky-kit.min.js"></script>
<script src="/js/docs.js"></script>
</body>
</html>
