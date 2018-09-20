@extends('account.layouts.default')

@section('account.content')
	<div class="card">
		<div class="card-header">Manage Team</div>
		<div class="card-body">
			<form action="{{ route('account.subscription.team.update') }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group">
                    <label for="name" class="control-label">Team name</label>
                    <input type="text" name="name" id="name" 
                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                           value="{{ old('name', $team->name) }}"
                    >

                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
		</div>
	</div>
	<div class="card mt-4" style="margin-bottom: 30px;">
		<div class="card-header">
			Team Members
		</div>
		<div class="card-body">
			<form action="{{ route('account.subscription.team.member.store') }}" method="POST" class="mb-3">
				@csrf
				<div class="form-group">
					<label for="email">Add a member by email</label>
					<input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
					        name="email" value="{{ old('email') }}"
					>
					@if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
				</div>
				<div class="form-group mt-2">
					<button type="submit" class="btn btn-default">Add Member</button>
				</div>
			</form>
			<hr>
			@if($team->users->count())
				<table class="table">
					<thead class="thead-light">
						<tr>
							<th>Member name</th>
							<th>Member mail</th>
							<th>Added</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@foreach($team->users as $member)
							<tr>
								<td>{{ $member->name }}</td>
								<td>{{ $member->email }}</td>
								<td>{{ $member->pivot->created_at->format('M d, Y') }}</td>
								<td>
									<a href="#" onclick="event.preventDefault(); document.getElementById('remove-{{ $member->id }}').submit();">Delete</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@else
				<h4 class="text-center">You've not added any team members yet.</h4>
			@endif

			@forelse($team->users as $user)
				<form action="{{ route('account.subscription.team.member.destroy', [$user]) }}" 
				         method="POST" id="remove-{{ $user->id }}" class="hidden" 
				>
					@csrf
					@method('DELETE')
				</form>
			@empty
			@endforelse
		</div>
	</div>
@stop