@extends('layouts.app')

@section('content')
	<div class="row justify-content-center">
		<div class="col-sm-6">
			<ul class="list-group">
				<li class="list-group-item active">
					Our Team Plans
				</li>
				@forelse($plans as $plan)
					<li class="list-group-item">
						<a href="{{ route('subscription.index', ['plan' => $plan->slug]) }}">{{ $plan->name }} ({{ $plan->price }})</a>
					</li>
				@empty
				@endforelse
				<li class="list-group-item">
					<a href="{{ route('plans.index') }}">User Plans</a>
				</li>
			</ul>
		</div>
	</div>
@stop