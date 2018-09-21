<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = [ 'title', 'body', 'attachment' ];

    public function campaign()
    {
    	return $this->hasOne(Campaign::class);
    }
}
