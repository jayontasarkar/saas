<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $campaigns = $request->user()->campaigns;
        $mailingLists = $request->user()->mailingLists;
        
        return view('dashboard', compact('campaigns', 'mailingLists'));
    }
}
