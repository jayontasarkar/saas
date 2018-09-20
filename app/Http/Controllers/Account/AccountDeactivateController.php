<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AccountDeactivateRequest;

class AccountDeactivateController extends Controller
{
    public function index(Request $request)
    {
    	return view('account.deactivate.index');
    }

    public function store(AccountDeactivateRequest $request)
    {
    	$user = $request->user();

    	if($user->subscribed('main')) {
    		$user->subscription('main')->cancel();
    	}
    	$user->delete();

    	return redirect('/')->withSuccess('Your account has been deactivated');
    }
}
