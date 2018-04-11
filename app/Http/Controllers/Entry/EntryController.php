<!-- Controller of (create) entry section -->

<?php

namespace App\Http\Controllers\Entry;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Event;
use App\Diary;
use App\Symptom;
use App\Illness;
use App\Entry;
use App\Http\Controllers\Controller;
use DateTime;
use Calendar;

class EntryController extends Controller
{
	/**
	 * authentication requirement
	 *
	 * @return void 
	 */
	public function __construct()
	{
      $this->middleware('auth');
  	}

	/**
  	 * Shows entry
  	 * 
  	 * @param  int
  	 * @return view
  	 */
	public function showentry($id)
	{
		$entry= Entry::findOrFail($id);
		$datetime1 = new DateTime($entry->complaint_startdate);
		$datetime2 = new DateTime($entry->complaint_enddate);
		$interval = $datetime1->diff($datetime2);
		$days = $interval->format('%a');
    	return view('entries.show_entry', compact('entry', 'days'));
	}

  	/**
  	 * Gives data on symptomes and illnesses when user goes to the medform page
  	 * 
  	 * @return view
  	 */
	public function create()
	{
		$user = Auth::user();
    	$symptomes = $user->diary->symptomes->sortBy('symptom');
    	$medicines = $user->diary->medicines;
    	$illnesses = $user->diary->illnesses;

    	return view('entries/create_entry', compact('symptomes', 'illnesses', 'medicines', 'illnessNew'));
	}

	/**
	 * Delete entry
	 * 
	 * @param  int
	 * @return redirect
	 */
	public function delete($id)
	{
		if (Auth::check())
		{
		  $entry= Entry::findOrFail($id);
			$entrynumber = $entry->id;
			DB::table('events')->where('entry_id', $entrynumber)->delete();
			Entry::find($id)->symptomes()->detach();
			Entry::find($id)->medicines()->detach();
			$entry = Entry::where('id', $id)->delete();
		}
		return redirect()->action('OverviewController@index');
	}

	/**
	 * Stores entry fieldinput into 'entries' database, places selected symptom_id's into 'entry_symptomes'
	 * 
	 * @param  Request
	 * @return redirect
	 */
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
			$entry = Entry::create(request([
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
				]));

			$entry->symptomes()->attach($request->symptom);
			$entry->medicines()->attach($request->medicine);

			//add diary entry as event to the database
			$illness = Illness::where('illness', $request->illness)->select('illness')->first();
			if(!empty($entry->complaint_enddate))
			{
				Event::create([
					'user_id' => $user->id,
					'entry_id' => $entry->id,
					'title' => $illness->illness,
					'start_date' => $request['complaint_startdate'],
					'end_date' => $request['complaint_enddate'],
				]);
			}
			else
			{
				Event::create([
					'user_id' => $user->id,
					'entry_id' => $entry->id,
					'title' => $illness->illness,
					'start_date' => $request['timespan_date'],
					'end_date' => $request['timespan_date'],
				]);
			}

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
			return redirect()->action('OverviewController@index');
		}
	}
}
