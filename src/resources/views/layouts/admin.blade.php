<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" >
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
@yield('meta')

	<title>サンプルサイト 管理画面 | Sample Site</title>

	<link rel="stylesheet" href="/css/skyblue.min.css">
	<link rel="stylesheet" href="/css/docs.css">

	<link rel="stylesheet" href="/css/sample.css">

	<link rel="stylesheet" href="/css/mpyw.css">
</head>
<body>


<div class="bg-dark padding-y-20">
	<div class="container text-center">
		<h1>Sentence 管理画面</h1>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col md-3">
			<div class="sidemenu js-sidemenu">
				<h5>メニュー</h5>
				<div>
					<a href="{{ route('admin@create') }}">管理者追加</a>
					<a href="{{ route('admin@search') }}">管理者検索</a>
					<a href="{{ route('admin@account_create') }}">ユーザ追加</a>
					<a href="{{ route('admin@account_search') }}">ユーザ検索</a>
					<a href="{{ route('admin@sentence_search') }}">センテンス検索</a>
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
@yield('js_lib')
@yield('js')
</body>
</html>
