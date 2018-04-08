<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\User;

class Event extends Model
{
    protected $fillable = ['user_id', 'entry_id', 'title', 'description', 'start_date', 'end_date'];

    public static function appointments()
    {
      $user = Auth::id();
      $start = date('Y-m-d');
      $end ="5999-12-31";
      return static::whereBetween('start_date', array(
        $start,
        $end
      ))->where('user_id', $user)->whereNull('entry_id')->take(3)->orderBy('start_date')->get();
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
