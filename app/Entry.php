<?php

namespace App;
// Model for entry relations

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\User;

class Entry extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'entry_id',
        'medicine_id',
        'diary_id',
        'illness',
        'timespan_date',
        'timespan_time',
        'location',
        'intensity',
        'complaint_startdate',
        'complaint_enddate',
        'complaint_time',
        'recoverytime_time',
        'weather',
        'witness_report',
        'comments'
        ];

    public function diary()
    {
        return $this->belongsTo('App\Diary');
    }

    public function symptomes()
    {
    	return $this->belongsToMany('App\Symptom');
    }

    public function illness()
    {
      return $this->belongsTo('App\Illness');
    }

    public function medicines()
    {
        return $this->belongsToMany('App\Medicine');
    }

    /**
     * Get 3 most recent entries in a users diary
     *
     * @return entries
     */
    public static function recentEntries()
    {
      $user = Auth::user();
      if(!empty($user->diary))
      {
        $start ="2000-12-31";
        $end = date('Y-m-d');
        $entries = $user->diary->entries()
            ->whereBetween('timespan_date', array(
                $start,
                $end
            ))
            ->take(3)
            ->orderBy('timespan_date', 'DESC')
            ->get();
        }
        else
        {
            $entries=null;
        }
      return $entries;
    }
}
