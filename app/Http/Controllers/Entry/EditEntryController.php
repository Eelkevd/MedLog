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
use App\Diary;
class EditEntryController extends Controller
{
	//authentication requirement
	public function __construct()
	{
      $this->middleware('auth');
  }

  // Gives data on symptomes and illnesses when user goes to the medform page
	public function editentry($id)
	{
    $entry= Entry::findOrFail($id);
		$user = Auth::user();
    	$symptomes = $user->diary->symptomes;
    	$medicines = $user->diary->medicines;
    	$illnesses = $user->diary->illnesses;

    	return view('entries/edit_entry', compact('symptomes', 'illnesses', 'medicines', 'entry', 'id'));
	}
	// Stores entry fieldinput into 'entries' database, places selected symptom_id's into 'entry_symptomes'
	public function store_update (Request $request)
	{
		// Check if the user is logged in
		if (Auth::check())
		{
			// find the corresponding diary
      $id = $request->id;
      // $entry = Entry::findOrFail($id);

			// add the diary_id to the request array
			// $request->request->add(['diary_id' => $user->diary->id]);
			// add the entry into the tabel entries
			$entry = Entry::where('id', $id)->update(request(['illness', 'timespan_date', 'timespan_time', 'location', 'intensity', 'complaint_startdate', 'complaint_enddate', 'complaint_time', 'recoverytime_time', 'weather', 'witness_report', 'comments']));
      // $symptoms = $request->symptom;
      // foreach($symptoms as $symptom){
      //     $entry->symptomes()->updateExistingPivot($id, $symptoms);
      //   }

      // Entry::where('id', $id)->symptomes()->update(request(['symptom']));
			// $entry->medicines()->attach($request->medicine);

			// //add diary entry as event to the database
			// $illness = Illness::where('illness', $request->illness)->select('illness')->first();
			// Event::update([
			// 	'user_id' => $user->id,
			// 	'title' => $illness->illness,
			// 	'start_date' => $request['timespan_date'],
			// 	'end_date' => $request['timespan_date'],
			// ]);
      //
			// // add diary entry/event to the calendar
			// $events = [];
			// $data = Event::all();
			// if($data->count())
			// {
			// 	foreach ($data as $key => $value)
			// 	{
			// 		$events[] = Calendar::event(
			// 			$value->title,
			// 			$value->description,
			// 			new \DateTime($value->start_date),
			// 			new \DateTime($value->end_date)
			// 		);
			// 	}
			// }
      //
			// $calendar = Calendar::addEvents($events);
			return redirect ('entries');
		}
	}
}
