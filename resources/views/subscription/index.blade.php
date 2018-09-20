@extends('layouts.app')

@section('content')
	<div class="row justify-content-center">
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">Subscription</div>
				<div class="card-body">
	                <form action="{{ route('subscription.store') }}" method="POST" class="form-horizontal" id="payment-form">
	                    {{ csrf_field() }}

	                    <div class="form-group row">
	                        <label for="plan" class="col-md-3 col-form-label">Plan</label>

	                        <div class="col-md-7">
	                            <select name="plan" id="plan" 
	                                    class="form-control{{ $errors->has('plan') ? ' is-invalid' : '' }}"
	                            >
	                                @foreach ($plans as $plan)
	                                    <option value="{{ $plan->gateway_id }}" {{ request('plan') === $plan->slug || old('plan') === $plan->gateway_id ? 'selected="selected"' : '' }}>{{ $plan->name }} (£{{ $plan->price }})</option>
	                                @endforeach
	                            </select>

	                            @if ($errors->has('plan'))
	                                <span class="invalid-feedback">
	                                    <strong>{{ $errors->first('plan') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group row mt-4">
	                        <label for="coupon" class="col-md-3 col-form-label">Coupon code</label>

	                        <div class="col-md-7">
	                            <input type="text" name="coupon"  
	                                   class="form-control{{ $errors->has('coupon') ? ' is-invalid' : '' }}" 
	                                   id="coupon" value="{{ old('coupon') }}"
	                            >

	                            @if ($errors->has('coupon'))
	                                <span class="invalid-feedback">
	                                    <strong>{{ $errors->first('coupon') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
	                    
	                    <div class="form-group row mt-4">
	                    	<div class="col-md-3"></div>
	                        <div class="col-md-7">
	                          <button type="submit" class="btn btn-primary" id="pay">Pay</button>
	                        </div>
	                    </div>
	                </form>
	            </div>
            </div>
		</div>
	</div>
@stop

@push('scripts')
	<script src="https://checkout.stripe.com/checkout.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		let handler = StripeCheckout.configure({
	            key: "{{ config('services.stripe.key') }}",
	            locale: 'auto',
	            token: function (token) {
	                let form = $('#payment-form')
	                $('#pay').prop('disabled', true)
	                $('<input>').attr({
	                    type: 'hidden',
	                    name: 'token',
	                    value: token.id
	                }).appendTo(form)

	                form.submit();
	            }
	        });

	        $('#pay').click(function (e) {
	        	e.preventDefault();
	            handler.open({
	                name: 'SaaS Ltd.',
	                description: 'Membership',
	                currency: 'usd',
	                key: "{{ config('services.stripe.key') }}",
	                email: "{{ auth()->user()->email }}"
	            })
	        })
    	});
    </script>
@endpush