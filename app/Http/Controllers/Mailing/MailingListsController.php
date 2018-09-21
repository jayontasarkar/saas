<?php

namespace App\Http\Controllers\Mailing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailingListsController extends Controller
{
    public function index(Request $request)		
    {
    	$mailings = $request->user()->mailingLists;

    	return view('campaign.mailings.index', compact('mailings'));
    }
}
