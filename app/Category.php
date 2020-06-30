<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function apps()
    {
        return $this->hasMany('App\Saas');
    }
}
