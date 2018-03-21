<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Symptom;
use App\Illness;
use App\Entry;
use Illuminate\Support\Facades\Auth;

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
    	$illnesses = Illness::all()->where('user_id', Auth::id());;
        return view('entries/create_entry', compact('symptomes', 'illnesses'));
	}

	// Stores entry fieldinput into 'entries' database, places selected symptom_id's into 'entry_symptomes' 
	public function store (Request $request) 
	{	
		$request['user_id'] = Auth::id();
		$request->validate([
			'illness_id' => 'required'
        ]);

        $entry = Entry::create(request(['user_id', 'illness_id', 'timespan_date', 'timespan_time', 'location', 'intensity', 'complaint_time', 'recoverytime_time', 'weather', 'witness_report', 'comments']));
        $entry->symptomes()->attach($request->symptom);
        // $entry->symptomes()->attach($request->user_id);
        return redirect ('entries');
	}
}