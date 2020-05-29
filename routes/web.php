<?php

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'verified']], function(){

	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

	/**
	 * Account
	 */
	Route::group(['prefix' => 'account', 'namespace' => 'Account', 'as' => 'account.'], function() {
	    Route::get('/', 'AccountController@index')->name('index');

	    /**
	     * Profile
	     */
	    Route::get('/profile', 'ProfileController@index')->name('profile.index');
	    Route::post('/profile', 'ProfileController@store')->name('profile.store');

	    /**
	     * Password
	     */
	    Route::get('/password', 'PasswordController@index')->name('password.index');
	    Route::post('/password', 'PasswordController@store')->name('password.store');

	    /**
	     * Account Deactivate
	     */
	    Route::get('/deactivate', 'AccountDeactivateController@index')->name('deactivate.index');
	    Route::post('/deactivate', 'AccountDeactivateController@store')->name('deactivate.store');

	    /**
	     * API Tokens
	     */
	    Route::get('/tokens', 'ApiTokensController@index')->name('tokens.index');

	    /**
		* Subscription
		*/
		Route::group([
				'namespace' => 'Subscription', 'middleware' => 'subscription.owner',
				'prefix' => 'subscription', 'as' => 'subscription.'
		], function(){
			// Cancel
			Route::group(['middleware' => ['subscription.notcancelled']], function(){
				Route::get('/cancel', 'SubscriptionCancelController@index')->name('cancel.index');
				Route::post('/cancel', 'SubscriptionCancelController@store')->name('cancel.store');
			});
			// Resume
			Route::group(['middleware' => ['subscription.cancelled']], function(){
				Route::get('/resume', 'SubscriptionResumeController@index')->name('resume.index');
				Route::post('/resume', 'SubscriptionResumeController@store')->name('resume.store');
			});
			// Card
			Route::group(['middleware' => ['subscription.customer']], function(){
				Route::get('/card', 'SubscriptionCardController@index')->name('card.index');
				Route::post('/card', 'SubscriptionCardController@store')->name('card.store');
			});
			// Swap
			Route::group(['middleware' => ['subscription.notcancelled']], function(){
				Route::get('/swap', 'SubscriptionSwapController@index')->name('swap.index');
				Route::post('/swap', 'SubscriptionSwapController@store')->name('swap.store');
			});
			// Team
			Route::group(['middleware' => ['subscription.team']], function(){
				Route::get('/team', 'SubscriptionTeamController@index')->name('team.index');
				Route::patch('/team', 'SubscriptionTeamController@update')->name('team.update');

				Route::post('/team/member', 'SubscriptionTeamMemberController@store')->name('team.member.store');
				Route::delete('/team/member/{user}', 'SubscriptionTeamMemberController@destroy')->name('team.member.destroy');
			});
		});
	});
});

/**
 * Subscription Plans
 */
Route::group(['prefix' => 'plans', 'as' => 'plans.', 'middleware' => 'subscription.inactive'], function(){
	Route::get('/', 'Subscription\PlanController@index')->name('index');
	Route::get('/teams', 'Subscription\TeamPlanController@index')->name('teams.index');
});

/**
 * Subscription
 */
Route::group([
		'prefix' => 'subscription', 'as' => 'subscription.',
		'middleware' => ['register.subscription', 'subscription.inactive']],
	function(){
	Route::get('/', 'Subscription\SubscriptionController@index')->name('index');
	Route::post('/', 'Subscription\SubscriptionController@store')->name('store');
});

Route::group(['middleware' => ['auth'], 'namespace' => 'Mailing', 'prefix' => 'mailings', 'as' => 'mailings.'], function(){
	Route::get('/', 'MailingListsController@index')->name('index');
	Route::get('/{mailing}/subscribers', 'MailingListSubscribersController@index')->name('subscribers.index');
});

Route::get('test', function(){
	$when = now()->subMinutes(3);
	$template = "<h3>Hello Mr, X</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, alias.</p>Thanks,<br><strong>Saas</strong>";
	Illuminate\Support\Facades\Mail::to(['email1@example.com', 'email2@example.com', 'email3@example.com', 'email4@example.com'])
	    ->later($when, new App\Mail\OrderConfirmed($template));
	return 'Order Confirmed';
});

Route::get('/test2', function(){
	$campaign = App\Models\Campaign::first();
	return $campaign->subscribers();
});

Route::post(
    'stripe/webhook',
    '\App\Http\Controllers\WebhookController@handleWebhook'
);