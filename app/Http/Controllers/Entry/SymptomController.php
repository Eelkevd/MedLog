<?php

namespace App\Http\Controllers\Entry;
// Controller of (create) symptom section

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Symptom;
use App\Diary;
use App\Http\Controllers\Controller;

class SymptomController extends Controller
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
  	 * stores symptomes into database
  	 *
  	 * @param  Request
  	 * @return redirect
  	 */
	public function store (Request $request)
	{
		// find the corresponding diary
		$user = Auth::user();

		// add the diary_id to the request array
		$request->request->add(['diary_id' => $user->diary->id]);
		$request->validate([
            'symptom'  => 'required',
        ]);

		$symptom = Symptom::create(request(['symptom']));
		$symptom->diaries()->attach($request->diary_id);

    	return redirect ('entries');
	}
}
