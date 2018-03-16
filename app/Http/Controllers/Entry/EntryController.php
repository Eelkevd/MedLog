<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Symptom;
use App\Illness;
use App\Entry;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

class EntryController extends Controller
{
	// public function home ()
	// {
	// 	return view ('entries/create_entry');
	// }

	public function create()
	{
    	$symptomes = Symptom::all();
    	$illnesses = Illness::all();
        return view('entries/create_entry', compact('symptomes', 'illnesses'));
	}

	public function store (Request $request) 
	{	
		// dd($request);
		$request->validate([
			'illness_id' => 'required'
        ]);

        $entry = Entry::create(request(['user_id', 'illness_id', 'timespan_date', 'timespan_time', 'location', 'intensity', 'complaint_time', 'recoverytime_time', 'weather', 'witness_report', 'comments']));
        $entry->symptomes()->attach($request->symptom);
        return redirect ('entries');
	}
}