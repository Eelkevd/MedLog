<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
  public function diary()
  {
    return $this->belongsTo('App\Diary');
  }
}
