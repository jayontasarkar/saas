@extends('campaign.layouts.default')

@section('campaign.content')
	<div class="card">
		<div class="card-header">
			Subscribers of "{{ $mailing->name }}"
		</div>
		<div class="card-body">
			@if(auth()->user()->hasSubscription())
				<table class="table">
					<thead class="bg-light">
						<tr>
							<th>Subscriber Name</th>
							<th>Email Address</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@forelse(($subscribers = $mailing->subscribers) as $subscriber)
						<tr>
							<td>{{ $subscriber->name }}</td>
							<td>{{ $subscriber->email }}</td>
							<td>
								<a href="#">Show</a>
							</td>
						</tr>
						@empty
							<tr>
								<td colspan="3" class="text-center">
									<strong>No subscriber was found.</strong>
								</td>
							</tr>
						@endforelse
					</tbody>
				</table>

			@else
				<h3 class="text-center">Subscribe with a plan to create a subscriber list.</h3>
			@endif
		</div>
	</div>
@stop