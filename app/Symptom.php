<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    protected $fillable = ['diary_id', 'user_id', 'symptom','start_date','end_date'];

    public function getRouteKeyName()
    {
    	return 'symptom';
    }

    public function diaries()
    {
      return $this->belongsToMany('App\Diary');
    }
}
