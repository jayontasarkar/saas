<?php

namespace App\Http\Controllers\Account\Subscription;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionCardController extends Controller
{
    public function index()
    {
    	return view('account.subscription.card.index');
    }

    public function store(Request $request)
    {
    	$request->user()->updateCard($request->token);

    	return redirect()->route('account.index')
    		->withSuccess('Your card details have been updated.');
    }
}
