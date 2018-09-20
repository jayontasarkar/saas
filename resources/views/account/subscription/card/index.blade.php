@extends('account.layouts.default')

@section('account.content')
    <div class="card">
    	<div class="card-header">Update Card Details</div>
        <div class="card-body">
            <form action="{{ route('account.subscription.card.store') }}" method="POST" id="card-form">
                {{ csrf_field() }}

                <p>Your new card will be used for future payments.</p>

                <button class="btn btn-primary" id="update">Update card</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        	let handler = StripeCheckout.configure({
	            key: '{{ config('services.stripe.key') }}',
	            locale: 'auto',
	            token: function (token) {
	                let form = $('#card-form')

	                $('#update').prop('disabled', true)

	                $('<input>').attr({
	                    type: 'hidden',
	                    name: 'token',
	                    value: token.id
	                }).appendTo(form)

	                form.submit();
	            }
	        })

	        $('#update').click(function (e) {
	            handler.open({
	                name: 'Codecourse Ltd.',
	                currency: 'gbp',
	                key: '{{ config('services.stripe.key') }}',
	                email: '{{ auth()->user()->email }}',
	                panelLabel: 'Update card'
	            })

	            e.preventDefault();
	        })
        });
    </script>
@endpush