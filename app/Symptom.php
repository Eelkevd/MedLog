<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    protected $fillable = ['user_id', 'symptom','start_date','end_date'];

    public function getRouteKeyName()
    {
    	return 'symptom';
    }

    public function entries()
    {
      return $this->belongsToMany('App\Entry');
    }

    public function diary()
    {
      return $this->belongsToMany('App\Diary');
    }
}
