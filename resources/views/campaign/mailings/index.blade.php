@extends('campaign.layouts.default')

@section('campaign.content')
	<div class="card">
		<div class="card-header">
			My Mailing Lists
		</div>
		<div class="card-body">
			@if(auth()->user()->hasSubscription())
				<table class="table">
					<thead class="bg-light">
						<tr>
							<th>Mailing List Name</th>
							<th>Created At</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@forelse($mailings as $mailing)
						<tr>
							<td>{{ $mailing->name }}</td>
							<td>{{ $mailing->created_at->format('M D Y, h:iA') }}</td>
							<td>
								<a href="{{ route('mailings.subscribers.index', [$mailing]) }}">Show</a>
							</td>
						</tr>
						@empty
							<tr>
								<td colspan="3" class="text-center">
									<strong>No mailing list was found.</strong>
								</td>
							</tr>
						@endforelse
					</tbody>
				</table>

			@else
				<h3 class="text-center">Subscribe with a plan to create a mailing list.</h3>
			@endif
		</div>
	</div>
@stop