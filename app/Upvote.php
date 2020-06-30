<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upvote extends Model
{
	protected $guarded = [];

    public function saas(){
    	return $this->belongsTo('App\Saas');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function totalUpvotes(){

    }


   
}
