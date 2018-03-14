<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Illness extends Model

{

	protected $fillable = ['illness','start_date','end_date'];

    public function getRouteKeyName()
    {
    	return 'illness';
    }
}
