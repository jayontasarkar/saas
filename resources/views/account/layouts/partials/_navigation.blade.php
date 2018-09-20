<div class="card mb-3">
	<div class="card-header">
		Account
	</div>
	<div class="card-body">
		<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		    <a class="nav-link{{ return_if(on_page('account'), ' active') }}"  
		       href="{{ route('account.index') }}" role="tab"
		    >Account overview</a>
		    <a class="nav-link{{ return_if(on_page('*/profile'), ' active') }}" 
		       href="{{ route('account.profile.index') }}"
		    >Profile</a>
		    <a class="nav-link{{ return_if(on_page('*/password'), ' active') }}"
		       href="{{ route('account.password.index') }}"
		    >Change Password</a>
		    <a class="nav-link{{ return_if(on_page('*/deactivate'), ' active') }}"
		       href="{{ route('account.deactivate.index') }}"
		    >Deactivate Account</a>
		</div>
	</div>
</div>


@subscribed
	@piggybacksubscription
		<div class="card mt-12">
			<div class="card-header">
				Subscription
			</div>
			<div class="card-body">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					@subscriptionnotcancelled
					    <a class="nav-link{{ return_if(on_page('*/subscription/swap'), ' active') }}"  
					       href="{{ route('account.subscription.swap.index') }}" role="tab"
					    >Change Plan</a>
					    <a class="nav-link{{ return_if(on_page('*/subscription/cancel'), ' active') }}" 
					       href="{{ route('account.subscription.cancel.index') }}"
					    >Cancel Subscription</a>
				    @endsubscriptionnotcancelled 
				    @subscriptioncancelled
					    <a class="nav-link{{ return_if(on_page('*/subscription/resume'), ' active') }}"
					       href="{{ route('account.subscription.resume.index') }}"
					    >Resume Subscription</a>
				    @endsubscriptioncancelled
				    <a class="nav-link{{ return_if(on_page('*/subscription/card'), ' active') }}"
				       href="{{ route('account.subscription.card.index') }}"
				    >Update Card</a>
				    @teamsubscription
						<a class="nav-link{{ return_if(on_page('*/subscription/team'), ' active') }}"
					       href="{{ route('account.subscription.team.index') }}"
					    >Manage team</a>
				    @endteamsubscription
				</div>
			</div>
		</div>
	@endpiggybacksubscription
@endsubscribed