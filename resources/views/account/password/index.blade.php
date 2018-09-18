@extends('account.layouts.default')

@section('account.content')
	<div class="card">
		<div class="card-body">
			<form action="{{ route('account.password.store') }}" method="POST">
				@csrf
				<div class="form-group">
					<label for="password_current">Current Password</label>
					<input type="password" name="password_current" 
					       class="form-control{{ $errors->has('password_current') ? ' is-invalid' : '' }}"
					>
					@if($errors->has('password_current'))
						<div class="invalid-feedback">
					        {{ $errors->first('password_current') }}
					    </div>
					@endif
				</div>
				<div class="form-group">
					<label for="password">New Password</label>
					<input type="password" name="password" 
					       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
					>
					@if($errors->has('password'))
						<div class="invalid-feedback">
					        {{ $errors->first('password') }}
					    </div>
					@endif
				</div>
				<div class="form-group">
					<label for="password_confirmation">Confirm Password</label>
					<input type="password" name="password_confirmation" 
					       class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
					>
					@if($errors->has('password_confirmation'))
						<div class="invalid-feedback">
					        {{ $errors->first('password_confirmation') }}
					    </div>
					@endif
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-default">Change Password</button>
				</div>
			</form>
		</div>
	</div>
@stop