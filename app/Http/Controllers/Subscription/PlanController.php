<?php

namespace App\Http\Controllers\Subscription;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    public function index()
    {
    	$plans = Plan::active()->forUsers()->get();

    	return view('subscription.plans.index', compact('plans'));
    }
}
