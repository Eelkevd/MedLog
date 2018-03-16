<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = ['user_id', 
        	'illness_id', 
        	'timespan_date', 
        	'timespan_time', 
        	'location', 
        	'intensity', 
        	'complaint_time', 
        	'recoverytime_time', 
        	'weather', 
        	'witness_report', 
        	'comments'];

    public function symptomes()
    {
    	return $this->belongsToMany(Symptom::class);
    }

    public function illness()
    {
      return $this->hasOne(Illness::class);
    }
}
