<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Illness;
use App\Diary;
use Illuminate\Support\Facades\Auth;

class IllnessController extends Controller
{
	//authentication requirement
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function store (Request $request) 
	{
		$request->validate([
            'illness'  => 'required',
        ]);
        // add the diary_id to the request array
		// find the corresponding diary
		$id = Auth::id();
		$diary = Diary::where('user_id', $id)->first();

		// add the diary_id to the request array
		$request->request->add(['diary_id' => $diary->id]);
		$illness = Illness::create(request(['illness']));
        return redirect ('entries');
	}
}