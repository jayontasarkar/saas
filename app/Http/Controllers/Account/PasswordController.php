<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Account\PasswordUpdated;
use App\Http\Requests\Account\PasswordFormRequest;

class PasswordController extends Controller
{
    public function index()
    {
    	return view('account.password.index');
    }

    public function store(PasswordFormRequest $request)
    {
    	$request->user()->update([
    		'password' => bcrypt($request->input('password'))
    	]);
    	Mail::to($request->user())->send(new PasswordUpdated);

    	return back();
    }
}
