<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    protected $fillable = ['symptom','start_date','end_date'];

    // public function symptomes()
    // {
    // 	return $this->belongsToMany(Article::class);
    // }

    public function getRouteKeyName()
    {
    	return 'symptom';
    }
}
