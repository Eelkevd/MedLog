<?php

namespace App;
// Model for symptom relations

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'diary_id',
        'user_id',
        'symptom',
        'start_date',
        'end_date'
    ];

    public function getRouteKeyName()
    {
    	return 'symptom';
    }

    public function diaries()
    {
      return $this->belongsToMany('App\Diary');
    }

    public function entries()
    {
      return $this->belongsToMany('App\Entry');
    }
}
