@extends('layouts.app') @section('content')

<div class="bg-main main">
@foreach($sentence_list as $sentence)
<?php
$user_id = $sentence['user_id'];
$user = $user_list[$user_id];
?>
	<div class="row text-left color-dark">
@if ($user_id == $login_user['user_id'])
		<div class="col md-1"></div>
		<div class="col md-9 pad-right-0">
			<a href="{{ route('sentence@get', ['screen_name' => $user['screen_name'], 'sentence_id' => $sentence['sentence_id']]) }}">
				<div class="text-left balloon balloon-me balloon--right_top">
					<div>{!! nl2br(e($sentence['sentence'])) !!}</div>
				</div>
			</a>
		</div>
		<div class="col md-2 pad-left-0">
			<img src="/img/figure_ouen.png" class="img-friend">
		</div>
@else
		<div class="col md-2 pad-right-0">
			<a href="{{ route('sentence@user_list', ['screen_name' => $user['screen_name']]) }}"><img src="/img/figure_ouen.png" class="img-me" alt="{{ $user['name'] }}"></a>
		</div>
		<div class="col md-9 pad-left-0">
			<a href="{{ route('sentence@get', ['screen_name' => $user['screen_name'], 'sentence_id' => $sentence['sentence_id']]) }}">
				<div class="text-left balloon balloon--left_top">
					<div>{!! nl2br(e($sentence['sentence'])) !!}</div>
				</div>
			</a>
		</div>
		<div class="col md-1"></div>
@endif
	</div>
@endforeach
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
