@extends('account.layouts.default')

@section('account.content')
	<div class="card">
		<div class="card-header">Cancel Subscription</div>
		<div class="card-body">
			<form action="{{ route('account.subscription.cancel.store') }}" method="POST">
				@csrf
				<p>
					<strong>Click on "Cancel" button to cancel your subscription. This will cancel your subscription.</strong>
				</p>
				<div class="form-group">
					<button type="submit" class="btn btn-default">Cancel</button>
				</div>
			</form>
		</div>
	</div>
@stop