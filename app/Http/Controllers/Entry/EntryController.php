<?php

// Controller of (create) entry section
namespace App\Http\Controllers\Entry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Calendar;
use App\Event;
use App\Diary;
use App\Symptom;
use App\Illness;
use App\Entry;

class EntryController extends Controller
{
	//authentication requirement
	public function __construct()
	{
      $this->middleware('auth');
  	}

		public function showentry($id)
	{
		$entry= Entry::findOrFail($id);
    	return view('entries.show_entry', compact('entry'));
	}

  // Gives data on symptomes and illnesses when user goes to the medform page
	public function create()
	{
		$user = Auth::user();
    	$symptomes = $user->diary->symptomes;
    	$medicines = $user->diary->medicines;
    	$illnesses = $user->diary->illnesses;
		
    	return view('entries/create_entry', compact('symptomes', 'illnesses', 'medicines'));
	}


	// Stores entry fieldinput into 'entries' database, places selected symptom_id's into 'entry_symptomes'
	public function store (Request $request)
	{
		// Check if the user is logged in
		if (Auth::check())
		{
			// find the corresponding diary
			$user = Auth::user();
			// add the diary_id to the request array
			$request->request->add(['diary_id' => $user->diary->id]);
			// add the entry into the tabel entries
			$entry = Entry::create(request(['diary_id', 'illness', 'timespan_date', 'timespan_time', 'location', 'intensity', 'complaint_startdate', 'complaint_enddate', 'complaint_time', 'recoverytime_time', 'weather', 'witness_report', 'comments']));
			$entry->symptomes()->attach($request->symptom);
			$entry->medicines()->attach($request->medicine);

			//add diary entry as event to the database
			$illness = Illness::where('illness', $request->illness)->select('illness')->first();
			Event::create([
				'user_id' => $user->id,
				'entry_id' => $entry->id,
				'title' => $illness->illness,
				'start_date' => $request['timespan_date'],
				'end_date' => $request['timespan_date'],
			]);

			// add diary entry/event to the calendar
			$events = [];
			$data = Event::all();
			if($data->count())
			{
				foreach ($data as $key => $value)
				{
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

}
