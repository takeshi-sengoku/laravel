@extends('layouts.nobody')

@section('meta')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('js')
	<script type="text/javascript">

$(document).ready(function(){
  $('#post').attr('disabled', 'disabled');

  $('#sentence').keyup(function () {
	if ($(this).val().length > 0) {
	  $('#post').removeAttr('disabled');
	} else {
	  $('#post').attr('disabled', 'disabled');
	}
  });

  $('#post').click(function () {
	$.ajaxSetup({
	  headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	$('#sentence').attr('disabled', 'disabled');

	$.ajax({
	  type: 'post',
	  url: '{{ route('sentence@create') }}',
	  data: {'sentence' : $('#sentence').val()},
	  success: function (data) {
		  if (data.result) {
			  location.reload(true);
		  }
	  },
	  dataType: 'json'
	});
  });
});

</script>
@endsection

@section('content')

<div class="flexbox">
	<div class="bg-main main">
@foreach($sentence_list as $sentence)
<?php
$user_id = $sentence['user_id'];
$user = $user_list[$user_id];

$sentence_url = route('sentence@get', [
	'screen_name' => $user['screen_name'],
	'id' => $sentence['sentence_id']
]);
$timeline_url = route('sentence@timeline', [
	'screen_name' => $user['screen_name']
]);

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
				<a href="{{ $timeline_url }}"><img src="/img/figure_ouen.png" class="img-friend"></a>
			</div>
@else
			<div class="col md-2 pad-right-0">
				<a href="{{ $timeline_url }}"><img src="/img/figure_ouen.png"
					class="img-me" alt="{{ $user['name'] }}"></a>
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
@endforeach

		<div class="row">
			<div class="col md-12">{{ Form::textarea('sentence', null, ['id' => 'sentence', 'class' => 'form-control']) }}</div>
		</div>

		<div class="row">
			<div class="col md-12 color-dark text-right">
				<button id="post" type="button" class="form-control btn btn-lg btn-warning">センテンス！！</button>
			</div>
		</div>
	</div>
</div>

@endsection
