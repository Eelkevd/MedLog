<?php

namespace App;
// Model for medicine relations

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'entry_id',
		'medicine_id',
		'diary_id',
		'medicine',
		'dose',
		'purpose',
		'side_effect',
		'deleted',
		'price',
		'comment'
	];

	public function diaries()
	{
		return $this->belongsToMany('App\Diary')->wherePivot('diary_id', 'medicine_id');
	}

	public function entries()
    {
        return $this->belongsToMany('App\Entry');
    }
}
