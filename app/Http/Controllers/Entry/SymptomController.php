<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Symptom;
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
		$request['user_id'] = Auth::id();
		$request->validate([
            'symptom'  => 'required',
        ]);
		$symptom = Symptom::create(request(['user_id', 'symptom']));
        return redirect ('entries');
	}
}