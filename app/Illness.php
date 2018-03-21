<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Illness extends Model

{
	protected $fillable = ['user_id', 'illness','start_date','end_date'];

    public function getRouteKeyName()
    {
    	return 'illness';
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
