<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{


    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function entries()
    {
    	return $this->hasMany('App\Entry');
    }
}
