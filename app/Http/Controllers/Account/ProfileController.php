<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\ProfileFormRequest;

class ProfileController extends Controller
{
    public function index()
    {
    	return view('account.profile.index');
    }

    public function store(ProfileFormRequest $request)
    {
    	$request->user()->update($request->only('name', 'email'));

    	return back()->withSuccess('Your profile updated.');
    }
}
