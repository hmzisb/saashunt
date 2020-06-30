<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	protected $guarded = [];
	
    public function saas()
    {
    	return $this->belongsTo('App\Saas');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
