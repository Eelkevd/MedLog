<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Symptom;
use App\Diary;
use Illuminate\Support\Facades\Auth;

class SymptomController extends Controller
{
	//authentication requirement
	public function __construct()
    {
        $this->middleware('auth');
    }

    // stores symptomes into database
	public function store (Request $request) 
	{
		$id = Auth::id();
		$diary = Diary::where('user_id', $id)->first();
		
		// $request['user_id'] = Auth::id();
		$request->request->add(['diary_id' => $diary->id]);
		$request->validate([
            'symptom'  => 'required',
        ]);
		$symptom = Symptom::create(request(['symptom']));
		$symptom->diaries()->attach($request->diary_id);
        return redirect ('entries');
	}
}