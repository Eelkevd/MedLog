<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
  public function diary()
  {
    return $this->belongsToMany('App\Diary');
  }
}
