<?php

namespace App\Http\Controllers\Entry;
// Controller of (create) illness section

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Illness;
use App\Diary;
use App\Http\Controllers\Controller;

class IllnessController extends Controller
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
	 * Stores illness into database
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
			'illness'  => 'required',
		]);

		$illness = Illness::create(request(['illness']));
		$illness->diary()->attach($request->diary_id);

    	return redirect ('entries');
	}
}
