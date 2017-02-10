@extends('layouts.app') @section('content')

<div class="bg-main main">
	<div class="row text-right color-dark">
		<div class="col md-1"></div>
		<div class="col md-9 pad-right-0">
			<div class="text-left balloon balloon--right_top">
				<div>ぐんにょり</div>
			</div>
		</div>
		<div class="col md-2 pad-left-0">
			<img src="/img/figure_ouen.png" class="img-friend">
		</div>
	</div>

	<div class="row text-left color-dark">
		<div class="col md-2 pad-right-0">
			<img src="/img/figure_ouen.png" class="img-me">
		</div>
		<div class="col md-9 pad-left-0">
			<div class="text-left balloon balloon--left_top">
				<div>
					ぐん<br> <br> <b>にょり

				</div>
			</div>
		</div>
		<div class="col md-1"></div>
	</div>

	{{ Form::open(['route' => 'sentence@create']) }}
	<div class="row">
		<div class="col md-12">
			{{ Form::textarea('sentence', null, ['class' => 'form-control']) }}
		</div>
	</div>

	<div class="row">
		<div class="col md-12 color-dark text-right">
			<button type="submit" class="form-control btn btn-lg btn-warning">センテンス</button>
		</div>
	</div>
	{{ Form::close() }}
</div>

@endsection
