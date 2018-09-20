@extends('account.layouts.default')

@section('account.content')
	<div class="card">
		<div class="card-header">
			Deactivate Account
		</div>
		<div class="card-body">
			<form action="{{ route('account.deactivate.store') }}" method="POST">
				@csrf
				<p class="text-danger">
					<strong>This will deactivate your account & cancel your active subscription.</strong>
				</p>
				<div class="form-group">
					<label for="password" class="control-label">Current Password</label>
					<input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
					@if($errors->has('password'))
						<div class="invalid-feedback">
							{{ $errors->first('password') }}
						</div>
					@endif
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default">Deactivate</button>
				</div>
			</form>
		</div>
	</div>
@stop