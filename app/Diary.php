<?php

namespace App;
// Model for diary relations

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function entries()
    {
    	return $this->hasMany('App\Entry');
    }

    public function reader()
    {
    	return $this->hasMany('App\Reader');
    }

    // might be used in controllers as symptom
    // when bugs appear, check spelling in view and controllers
    public function symptomes()
    {
    	return $this->belongsToMany('App\Symptom');
    }

    public function illnesses()
    {
        return $this->belongsToMany('App\Illness');
    }

    // might be used in controllers as medicine
    // when bugs appear, check spelling in view and controllers
    public function medicines()
    {
    	return $this->belongsToMany('App\Medicine');
    }

    public function tools()
    {
    	return $this->belongsToMany('App\Tool');
    }
}
