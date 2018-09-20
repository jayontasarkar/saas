@extends('account.layouts.default')

@section('account.content')
	<div class="card">
		<div class="card-header">Resume Subscription</div>
		<div class="card-body">
			<form action="{{ route('account.subscription.resume.store') }}" method="POST">
				@csrf
				<p>
					<strong>Click on "Resume" button to resume your subscription. This will resume your subscription.</strong>
				</p>
				<div class="form-group">
					<button type="submit" class="btn btn-default">Resume</button>
				</div>
			</form>
		</div>
	</div>
@stop