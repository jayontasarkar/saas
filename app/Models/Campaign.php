<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
    	'name', 'email_at', 'template_id', 'user_id'
    ];

    protected $dates = [ 'email_at' ];

    public function setEmailAtAttribute($value)
    {
    	$this->attributes['email_at'] = Carbon::parse($value);
    }

    public function template()
    {
    	return $this->belongsTo(Template::class);
    }

    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function mailingLists()
    {
    	return $this->belongsToMany(MailingList::class, 'campaign_mailing_list', 'campaign_id', 'mailing_list_id');
    }

    public function subscribers()
	{
	    $mailingListIds = $this->mailingLists->pluck('id')->toArray();
	    if(count($mailingListIds)) {
	    	return Subscriber::whereHas('mailingLists', function($query) use ($mailingListIds){
	    		$query->whereIn('mailing_lists.id', $mailingListIds);
	    	})->distinct()->get();
	    }
	    return [];
	}
}
