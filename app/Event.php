<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\User;

class Event extends Model
{
    protected $fillable = [
        'user_id', 
        'entry_id', 
        'title', 
        'description', 
        'event_time', 
        'start_date', 
        'end_date'
    ];

    public static function appointments()
    {
        $user = Auth::user();
        if(!empty($user->events))
        {
            $start = date('Y-m-d');
            $end = "5999-12-31";
            $events = $user->events()
                ->whereBetween(
                    'start_date', 
                    array(
                        $start,
                        $end
                    )
                )
                ->whereNull('entry_id')
                ->take(3)
                ->orderBy('start_date', 'ASC')
                ->get();
        }
        else
        {
            $events=null;
        }

        return $events;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
