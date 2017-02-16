@extends('layouts.admin')

@section('content')
		<h2>管理者追加</h2>

@if (count($errors) > 0)
		<div class="row">
			<div class="col md-12 color-error">
				<div class="alert alert-danger">
					<ul>
@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
@endforeach
					</ul>
				</div>
			</div>
		</div>
@endif

{{ Form::open(['route' => 'admin@create_cnf']) }}
		<div class="row">
			<div class="col md-12">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<th>表示名</th>
							<td>{{ Form::text('screen_name', null, ['class' => 'form-control']) }}</td>
						</tr>
						<tr>
							<th>パスワード</th>
							<td>{{ Form::input('password', 'password', null, ['class' => 'form-control']) }}</td>
						</tr>
						<tr>
							<th>メールアドレス</th>
							<td>{{ Form::text('mail', null, ['class' => 'form-control']) }}</td>
						</tr>
						<tr>
							<th>アカウント有効期限</th>
							<td>{{ Form::input('date', 'expired', null, ['class' => 'form-control']) }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col md-12 text-right">
				{{ Form::button('確認する', ['name' => 'submit', 'value' => 1, 'type' => 'submit', 'class' => 'form-control btn btn-success']) }}
			</div>
		</div>
{{ Form::close() }}

@endsection
