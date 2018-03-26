<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Symptom;
use App\Illness;
use App\Entry;
use Illuminate\Support\Facades\Auth;
use Calendar;
use App\Event;

class EntryController extends Controller
{
	//authentication requirement
	public function __construct()
	{
      $this->middleware('auth');
  	}

    // Gives data on symptomes and illnesses when user goes to the medform page
	public function create()
	{
    	$symptomes = Symptom::all()->where('user_id', Auth::id());
    	$illnesses = Illness::all();
    	return view('entries/create_entry', compact('symptomes', 'illnesses'));
	}

	// Stores entry fieldinput into 'entries' database, places selected symptom_id's into 'entry_symptomes'
	public function store (Request $request)
	{

			// $request['user_id'] = Auth::id();
			// $request->validate([
			// 'illness_id' => 'required'
   //    		]);

		// $user = App\User::find(1);
		

		$entry = Entry::create(request([
			'timespan_date', 
			'timespan_time', 
			'location', 
			'intensity', 
			'complaint_time', 
			'recoverytime_time', 
			'weather', 
			'witness_report', 
			'comments'
		]));
		$entry->symptomes()->attach($request->symptom);

		// add diary entry as event to the database
		$illness = Illness::where('id', $request->illness_id)->select('illness')->first();
		Event::create([
		'title' => $illness->illness,
		'start_date' => $request['timespan_date'],
		'end_date' => $request['timespan_date'],
		]);

		// add diary entry/event to the calendar
		$events = [];
		$data = Event::all();
		if($data->count()){
			foreach ($data as $key => $value) {
				$events[] = Calendar::event(
					$value->title,
					$value->description,
					new \DateTime($value->start_date),
					new \DateTime($value->end_date)
				);
			}
		}
		$calendar = Calendar::addEvents($events);
		return redirect ('entries');
	}
}
