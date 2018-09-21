<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailingList extends Model
{
    protected $fillable = [ 'name', 'user_id' ];

    public function campaigns()
    {
    	return $this->belongsToMany(Campaign::class, 'campaign_mailing_list', 'mailing_list_id', 'campaign_id');
    }

    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function subscribers()
    {
    	return $this->belongsToMany(Subscriber::class, 'mailing_list_subscriber', 'mailing_list_id', 'subscriber_id');
    }
}
