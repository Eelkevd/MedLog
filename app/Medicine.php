<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
	protected $fillable = [
		'diary_id', 
		'medicine', 
		'dose', 
		'purpose', 
		'side_effect', 
		'expire_date', 
		'price',
		'comment'
	];

  public function diaries()
  {
    return $this->belongsToMany('App\Diary');
  }
}
