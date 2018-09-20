@extends('account.layouts.default')

@section('account.content')
	<div class="card">
		<div class="card-header">Swap Subscription</div>
		<div class="card-body">
			<form action="" method="POST">
				@csrf
				<div class="form-group">
					<label for="plan" class="control-label">Select plan</label>
					<select name="plan" id="plan" class="form-control{{ $errors->has('plan') ? ' is-invalid' : '' }}">
						@foreach($plans as $plan)
							<option value="{{ $plan->gateway_id }}">
								{{ $plan->name }} ( {{ '$' . number_format($plan->price, 2) }} )
							</option>
						@endforeach
					</select>
					@if ($errors->has('plan'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('plan') }}</strong>
                        </span>
                    @endif
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Update Subscription</button>
				</div>
			</form>
		</div>
	</div>
@stop