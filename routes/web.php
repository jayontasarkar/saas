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
	});

	/**
	 * Subscription & Plans
	 */
	Route::group(['prefix' => 'plans', 'as' => 'plans.'], function(){
		Route::get('/', 'Subscription\PlanController@index')->name('index');
		Route::get('/teams', 'Subscription\TeamPlanController@index')->name('teams.index');
	});
});