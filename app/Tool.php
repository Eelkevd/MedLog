<!-- Model for tool relations -->

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
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
