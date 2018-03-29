<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Illness extends Model
{
	protected $fillable = ['user_id', 'illness','start_date','end_date'];

    public function getRouteKeyName()
    {
    	return 'illness';
    }

    public function entry()
    {
      return $this->hasMany('App\Entry');
    }

		public function diary()
    {
    	return $this->belongsToMany('App\Diary');
    }
}
