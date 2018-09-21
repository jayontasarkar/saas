@extends('campaign.layouts.default')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">
@endpush

@section('campaign.content')
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-10">My Campaigns</div>
				<div class="col-md-2">
					<create-campaign :mailings="{{ json_encode($mailingLists) }}"></create-campaign>
				</div>
			</div>
		</div>
		<div class="card-body">
			@if(auth()->user()->hasSubscription())
				<table class="table">
					<thead class="bg-light">
						<tr>
							<th>Campaign Name</th>
							<th>Sending Date</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@forelse($campaigns as $campaign)
						<tr>
							<td>{{ $campaign->name }}</td>
							<td>{{ $campaign->email_at->format('M D Y, h:iA') }}</td>
							<td></td>
						</tr>
						@empty
							<tr>
								<td colspan="3" class="text-center">
									<strong>No campaign was found.</strong>
								</td>
							</tr>
						@endforelse
					</tbody>
				</table>

			@else
				<h3 class="text-center">Subscribe with a plan to create a campaign.</h3>
			@endif
		</div>
	</div>
@stop