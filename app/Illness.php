<?php

namespace App;
// Model for illness relations

use Illuminate\Database\Eloquent\Model;

class Illness extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
        'user_id',
        'illness',
        'start_date',
        'end_date'
    ];

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
