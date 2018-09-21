<?php

namespace App\Http\Controllers\Mailing;

use App\Http\Controllers\Controller;
use App\Models\MailingList;
use Illuminate\Http\Request;

class MailingListSubscribersController extends Controller
{
    public function index(MailingList $mailing)
    {
    	$mailing = $mailing->load('subscribers');

    	return view('campaign.mailings.subscribers.index', compact('mailing'));
    }
}
