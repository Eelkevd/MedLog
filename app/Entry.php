<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = ['illness_id'];

    public function symptomes()
    {
    	return $this->belongsToMany(Symptom::class);
    }

    public function illness()
    {
      return $this->hasOne(Illness::class);
    }
}
