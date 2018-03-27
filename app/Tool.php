<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    public function diary()
    {
      return $this->belongsToMany('App\Diary');
    }
}
