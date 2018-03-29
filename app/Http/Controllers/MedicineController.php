<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Medicine;
use App\Diary;

class MedicineController extends Controller
{
	// Authentication requirement
	public function __construct()
	{
      $this->middleware('auth');
  	}

  	// Function to go to te medicine page on nav btn click
	public function home()
	{
		// $medicine = Medicine::find(2);
		// dd($medicine->first()->get());

		$medicines = Medicine::all();
		return view('medicine/medicine', compact('medicines'));
	}

	// Function to go to the create new medicine page
	public function create()
	{
		return view('medicine/create_medicine');
	}

	// Function to store newly created medicine into the db
	public function store(Request $request)
	{
		// Check if user is logged in
		if (Auth::check())
		{

			// find the corresponding diary
			$id = Auth::id();
			$diary = Diary::where('user_id', $id)->first();

			// add the diary_id to the request array
			$request->request->add(['diary_id' => $diary->id]);

			// add the entry into the tabel entries
			$medicine = Medicine::create(request([
				'medicine', 
				'dose', 
				'purpose', 
				'side_effect', 
				'expire_date',
				'price', 
				'comment'
			]));
			$medicine->diaries()->attach($request->diary_id);

			return redirect ('medicine');
		}
	}
}