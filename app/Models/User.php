<?php

namespace App\Models;

use App\Models\Traits\HasConfirmationToken;
use App\Models\Traits\HasSubscription;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Subscription;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasConfirmationToken, Billable, HasSubscription, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', ''
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function team()
    {
        return $this->hasOne(Team::class);
    }

    public function getPlanAttribute()
    {
        return $this->plan();
    }

    public function plan()
    {
        return $this->plans->first();
    }

    public function plans()
    {
        return $this->hasManyThrough(
            Plan::class, Subscription::class, 'user_id', 'gateway_id', 'id', 'stripe_plan'
        )->orderBy('subscriptions.created_at', 'desc');
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class)->withTimestamps();
    }
}
