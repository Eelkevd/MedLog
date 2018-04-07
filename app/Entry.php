<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Entry extends Model
{
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

    public static function recentEntries()
    {
      $start ="2000-12-31";
      $end = date('Y-m-d');
      return static::whereBetween('timespan_date', array(
        $start,
        $end
      ))->take(3)->orderBy('timespan_date', 'DESC')->get();
    }

}
