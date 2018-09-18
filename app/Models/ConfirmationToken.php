<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfirmationToken extends Model
{
    protected $fillable = [
    	'token', 'expires_at'
    ];

    protected $dates = ['expires_at'];

    public function getRouteKeyName()
    {
    	return 'token';
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function hasExpired()
    {
    	return $this->freshTimestamp()->gt($this->expires_at);
    }
}
