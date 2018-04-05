<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{

      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
          'user_id', 'diary_id', 'timeframe', 'email', 'password'
      ];

      /**
       * The attributes that should be hidden for arrays.
       *
       * @var array
       */
      protected $hidden = [
          'password', 'token',
      ];


  public function diary()
  {
    return $this->belongsTo('App\Diary');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

}
