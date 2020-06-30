<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saas extends Model
{
	Public $guarded = [];

	public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
    	 return $this->belongsTo('App\Category');
    }

    public function upvotes()
    {
    	 return $this->hasMany('App\Upvote');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

}
