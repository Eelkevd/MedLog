<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $fillable = ['user_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function entries()
    {
    	return $this->hasMany('App\Entry');
    }

    public function symptomes()
    {
    	return $this->belongsToMany('App\Symptom');
    }

    public function illnesses()
    {
      return $this->belongsToMany('App\Illness');
    }

    public function medicines()
    {
    	return $this->belongsToMany('App\Medicine');
    }

    public function tools()
    {
    	return $this->belongsToMany('App\Tool');
    }
}
