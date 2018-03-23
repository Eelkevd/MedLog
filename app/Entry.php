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
    	return $this->belongsToMany('App\Symptom');
    }

    public function illness()
    {
      return $this->belongsTo('App\Illness');
    }

    // public function user()
    // {
    //   return $this->belongsTo(User::class);
    // }

    public function diary()
    {
        return $this->belongsTo('App\Diary');
    }
}
