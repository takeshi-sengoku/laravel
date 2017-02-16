@extends('layouts.admin')

@section('content')
		<h2>管理者追加 - 確認</h2>

{{ Form::open(['route' => 'admin@create_cmp']) }}
		<div class="row">
			<div class="col md-12">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<th>表示名</th>
							<td>{{ $screen_name }}</td>
						</tr>
						<tr>
							<th>パスワード</th>
							<td>****</td>
						</tr>
						<tr>
							<th>メールアドレス</th>
							<td>{{ $mail }}</td>
						</tr>
						<tr>
							<th>アカウント有効期限</th>
							<td>{{ $expired }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col md-12 text-right">
				{{ Form::button('戻る', ['name' => 'back', 'value' => 1, 'type' => 'submit', 'class' => 'form-control btn btn-success']) }}
				&nbsp;
				{{ Form::button('追加する', ['name' => 'submit', 'value' => 1, 'type' => 'submit', 'class' => 'form-control btn btn-error']) }}
			</div>
		</div>
{{ Form::close() }}

@endsection
