@extends('account.layouts.default')

@section('account.content')
	<div class="card">
		<div class="card-body">
			<form action="{{ route('account.profile.store') }}" method="POST">
				@csrf
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" 
					       value="{{ old('name', auth()->user()->name) }}" 
					       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
					>
					@if($errors->has('name'))
						<div class="invalid-feedback">
					        {{ $errors->first('name') }}
					    </div>
					@endif
				</div>
				<div class="form-group">
					<label for="email">Email Address</label>
					<input type="email" id="email" name="email" 
					       value="{{ old('email', auth()->user()->email) }}" 
					       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
					>
					@if($errors->has('email'))
						<div class="invalid-feedback">
					        {{ $errors->first('email') }}
					    </div>
					@endif       
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default">Update</button>
				</div>
			</form>
		</div>
	</div>
@stop