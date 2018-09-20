<?php

namespace App\Http\Controllers\Account\Subscription;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subscription\SubscriptionSwapRequest;
use App\Models\Plan;
use Illuminate\Http\Request;

class SubscriptionSwapController extends Controller
{
    public function index(Request $request)
    {
    	$plans = Plan::except($request->user()->id)->active()->get();

    	return view('account.subscription.swap.index', compact('plans'));
    }

    public function store(SubscriptionSwapRequest $request)
    {
    	$user = $request->user();
    	$plan = Plan::where('gateway_id', $request->plan)->first();

    	if($this->downgradesFromTeamPlan($user, $plan)) {
    		$user->team->users()->detach();
    	}
    	$user->subscription('main')->swap($plan->gateway_id);

    	return back()->withSuccess('Your subscribtion plan has changed');
    }

    private function downgradesFromTeamPlan($user, $plan)
    {
    	if( $user->plan->isForTeams() && $plan->isNotForTeams() ) {
    		return true;
    	}
    	return false;
    }
}
