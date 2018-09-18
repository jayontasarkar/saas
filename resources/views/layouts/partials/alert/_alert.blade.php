@if(session()->has('success'))
	@component('layouts.partials.alert._alert_component', ['type' => 'success'])
		{{ session('success') }}
	@endcomponent
@endif

@if(session()->has('error'))
	@component('layouts.partials.alert._alert_component', ['type' => 'danger'])
		{{ session('error') }}
	@endcomponent
@endif