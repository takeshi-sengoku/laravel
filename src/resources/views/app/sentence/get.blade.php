@extends('layouts.app') @section('content')

<div class="bg-main main">
<?php
$user_id = $sentence['user_id'];

$sentence_url = route('sentence@get', ['screen_name' => $user['screen_name'], 'id' => $sentence['sentence_id']]);
$timeline_url = route('sentence@timeline', ['screen_name' => $user['screen_name']]);

$is_own = $user_id == $login_user['user_id'];

$sentence_text = nl2br(e($sentence['sentence']));
?>
	<div class="row text-left color-dark">
@if ($is_own)
		<div class="col md-1"></div>
		<div class="col md-9 pad-right-0">
			<a href="{{ $sentence_url }}">
				<div class="text-left balloon balloon-me balloon--right_top">
					<div>{!! $sentence_text !!}</div>
				</div>
			</a>
		</div>
		<div class="col md-2 pad-left-0">
			<img src="/img/figure_ouen.png" class="img-friend">
		</div>
@else
		<div class="col md-2 pad-right-0">
			<a href="{{ $timeline_url }}"><img src="/img/figure_ouen.png" class="img-me" alt="{{ $user['name'] }}"></a>
		</div>
		<div class="col md-9 pad-left-0">
			<a href="{{ $sentence_url }}">
				<div class="text-left balloon balloon--left_top">
					<div>{!! $sentence_text !!}</div>
				</div>
			</a>
		</div>
		<div class="col md-1"></div>
@endif
	</div>

	{{ Form::open(['route' => 'sentence@create']) }}
	<div class="row">
		<div class="col md-12">
			{{ Form::textarea('sentence', null, ['class' => 'form-control']) }}
		</div>
	</div>

	<div class="row">
		<div class="col md-12 color-dark text-right">
			<button type="submit" class="form-control btn btn-lg btn-warning">センテンス！！</button>
		</div>
	</div>
	{{ Form::close() }}
</div>

@endsection
