@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-3">
			@include('campaign.layouts.partials._navigation')
		</div>
		<div class="col-md-9">
			@yield('campaign.content')
		</div>
	</div>
@stop