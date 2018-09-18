<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
    	'name', 'slug', 'gateway_id', 'price', 
    	'active', 'teams_enabled', 'teams_limit'
    ];

    public function scopeActive(Builder $builder)
    {
    	return $builder->where('active', true);
    }

    public function scopeForUsers(Builder $builder)
    {
    	return $builder->where('teams_enabled', false);
    }

    public function scopeForTeams(Builder $builder)
    {
    	return $builder->where('teams_enabled', true);
    }
}
