<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = [
    	'name', 'email'
    ];

    public function mailingLists()
    {
    	return $this->belongsToMany(MailingList::class, 'mailing_list_subscriber', 'subscriber_id', 'mailing_list_id');
    }
}
