<?php

namespace App;
// Model for tool relations

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
	/**
    * The attributes that are mass assignable.
    *
    * @var array
    */
	protected $fillable = [
		'tool_id',
		'diary_id',
		'tool',
		'purpose',
		'origin',
		'return_date',
		'price',
		'comment'
	];

    public function diaries()
    {
      return $this->belongsToMany('App\Diary');
    }
}
