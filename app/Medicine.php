<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
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
