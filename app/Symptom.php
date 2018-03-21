<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    protected $fillable = ['user_id', 'symptom','start_date','end_date'];

    // public function symptomes()
    // {
    // 	return $this->belongsToMany(Article::class);
    // }

    public function getRouteKeyName()
    {
    	return 'symptom';
    }

    public function entry()
    {
      return $this->belongsToMany(Entry::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
