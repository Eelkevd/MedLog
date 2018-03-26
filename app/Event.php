<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'start_date', 'end_date'];

    public static function appointments()
    {
      $start = date('Y-m-d');
      $end ="5999-12-31";
      return static::whereBetween('start_date', array(
        $start,
        $end
      ))->take(5)->orderBy('start_date')->get();
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
